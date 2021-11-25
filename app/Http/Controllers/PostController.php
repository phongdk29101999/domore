<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\UserPostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\SESSION;
use App\Http\Requests;
use App\Post;
use App\PostTag;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

session_start();

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # Get all post
    function all_post(Request $request)
    {
        $posts = Post::paginate(3);
        $title = "Posts";
        if ($request->ajax()) {
            return view('post.post_data', compact('posts', 'title'))->render();
        }
        return view('post.posts', compact('posts', 'title'));
    }

    # Get post by id
    public function post_detail($post_id)
    {
        $post = Post::find($post_id);
        if($post === null){
            return view('error.error')->with('code',404)->with('message','Post id not found');
        }
        $recent_posts = Post::where('post_id', '!=', $post_id)->orderBy('date_create', 'desc')->take(3)->get();

        $comment_count = DB::table('comments')
            ->join('posts', 'comments.post_id', '=', 'posts.post_id')
            ->where('posts.post_id', '=', $post_id)
            ->count();

        $comments = DB::table('comments')
            ->join('posts', 'comments.post_id', '=', 'posts.post_id')
            ->join('users', 'comments.user_id', '=', 'users.user_id')
            ->where('posts.post_id', '=', $post_id)
            ->select('comments.content', 'users.user_name', 'users.avatar_url')
            ->paginate(5);


        $current_user = User::find(auth()->user()->user_id);
        $search_user_post = DB::table('user_post_like')->where('user_id', $current_user->user_id)->where('post_id', $post_id)->first();

        $count_like = DB::table('user_post_like')->where('post_id', $post_id)->where('like_state', 1)->count();

        if (!$search_user_post) {
            $data = array();
            $data["user_id"] = $current_user->user_id;
            $data["post_id"] = $post_id;
            $data["like_state"] = 0;
            DB::table("user_post_like")->insert($data);
            $search_user_post = DB::table('user_post_like')->where('user_id', $current_user->user_id)->where('post_id', $post_id)->select('like_state')->first();
        } else {
            $search_user_post = DB::table('user_post_like')->where('user_id', $current_user->user_id)->where('post_id', $post_id)->select('like_state')->first();
        }

        $post_tags = Tag::whereHas('posts', function ($query) use ($post_id) {
            $query->where('posts.post_id', $post_id);
        })->get();

        return view('post.post_detail', compact(
            'post',
            'recent_posts',
            'comment_count',
            'comments',
            'current_user',
            'search_user_post',
            'count_like',
            'post_tags'
        ));
    }

    # Get post by tag_id
    public function post_tag(Request $request, $tag_id)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag_id) {
            $query->where('tags.tag_id', $tag_id);
        })->paginate(3);

        $tag = Tag::find($tag_id);
        if($tag == null){
            return view('error.error')->with('code',404)->with('message','Tag id not found');
        }

        $title = strtoupper($tag->tag_title);

        if ($request->ajax()) {
            return view('post.post_data', compact('posts', 'title'))->render();
        }
        return view('post.posts', compact('posts', 'title'));
    }

    # Create new post
    public function create(Request $request)
    {
        $current_user = User::find(auth()->user()->user_id);
        if ($request->isMethod('post')) {
            # Validate post form data
            $request->validate(
                [
                    'title' => ['required', 'min:4', 'max:255'],
                    'tags' => 'required',
                    'description' => 'required',
                    'detail_content' => 'required'
                ]
            );

            $post = new Post();
            $post->user_id = $current_user->user_id;
            $post->title = $request->title;

            if ($request->hasFile('post_url')) {
                $filenameWithExt = $request->file('post_url')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('post_url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('post_url')->storeAs('public/post_url', $filenameToStore);
                $post->post_url = $filenameToStore;
            }

            $post->content = $request->detail_content;
            $post->description = $request->description;
            $post->date_create = date('Y-m-d');
            $post->save();

            $post_id = $post->post_id;

            $tags = $request->tags;
            foreach ($tags as $tag_id) {
                $post->tags()->attach($tag_id);
            }
            return redirect('/posts/' . $post_id);
        }
        return view('post.create_post');
    }

    # Edit post
    public function edit(Request $request,$post_id){
        $post = Post::find($post_id);
        if($post == null){
            return view('error.error')->with('code',404)->with('message','Post id not found');
        }
        if($this->require_same_user($post_id) == FALSE){
            return redirect('/');
        }


        $selected_tags_array = array();
        foreach ($post->tags as $selected_tag) {
            array_push($selected_tags_array, $selected_tag->tag_id);
        }

        if ($request->isMethod('post')) {
            $post = Post::find($post_id);
            $post->title = $request->title;

            if ($request->hasFile('post_url')) {
                $filenameWithExt = $request->file('post_url')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('post_url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('post_url')->storeAs('public/post_url', $filenameToStore);
                $post->post_url = $filenameToStore;
            }

            $post->content = $request->detail_content;
            $post->description = $request->description;
            $post->date_create = date('Y-m-d');

            $post_tag_list = PostTag::where('post_id', $post_id);
            $post_tag_list->delete();
            $tags = $request->tags;
            foreach ($tags as $tag_id) {
                //                $post_tag = new PostTag();
                //                $post_tag->post_id = $post_id;
                //                $post_tag->tag_id = $tag_id;
                //                $post_tag->save();
                $post->tags()->attach($tag_id);
            }
            $post->save();
            return redirect('/posts/' . $post_id);
        }
        return view('post.edit_post', compact('post', 'selected_tags_array'));
    }

    # Delete post
    public function delete($post_id){
        $post = Post::find($post_id);
        if($post == null){
            return view('error.error')->with('code',404)->with('message','Post id not found');
        }

        if($this->require_same_user($post_id) == FALSE){
            if(auth()->user()->admin == FALSE){
                return redirect('/');
            }
        }

        $post->delete();
        return redirect('/posts');
    }

    #add comment
    public function add_comment(Request $request)
    {
        $comments = DB::table('comments')->get();
        if ($request->isMethod('post')) {
            $dataa = array();
            $dataa["post_id"] = $request->post_id;
            $dataa["user_id"] = $request->user_id;
            $dataa["content"] = $request->content;
            DB::table("comments")->insert($dataa);
        }
        return redirect("/posts/{$request->post_id}");
    }


    public function require_same_user($post_id){
        $post = Post::find($post_id);
        $post_user = $post->user;
        if(auth()->user() == $post_user){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    # Like action
    public function react(Request $request)
    {
        $post_id = $request->post_id;
        $user_id = (User::find(auth()->user()->user_id))->user_id;
        $current_state = DB::table('user_post_like')->where('user_id', $user_id)->where('post_id', $post_id)->select('like_state')->first();
        if ($current_state->like_state == 0) {
            DB::table('user_post_like')->where('post_id', $post_id)->where('user_id', $user_id)->update(['like_state' => 1]);
        } else {
            DB::table('user_post_like')->where('post_id', $post_id)->where('user_id', $user_id)->update(['like_state' => 0]);
        }

        $count_like = DB::table('user_post_like')->where('post_id', $post_id)->where('like_state', 1)->count();

        if ($request->ajax()) {
            return $count_like;
        }
        return redirect('/posts/' . $post_id);
    }

    # Get my posts
    public function get_my_posts(Request $request)
    {
        $current_user = User::find(auth()->user()->user_id);
        $posts = Post::where('user_id', $current_user->user_id)->paginate(3);
        $title = "My posts";
        if ($request->ajax()) {
            return view('post.post_data', compact('posts', 'title'))->render();
        }
        return view('post.posts', compact('posts', 'title'));
    }

    // public function unactive_post(Request $request){
    //     $post_id = $request->post_id;
    //     $user_id = (User::find(auth()->user()->user_id))->user_id;
    //     DB::table('user_post_like')->where('post_id',$post_id)->where('user_id',$user_id)->update(['like_state'=>0]);
    //     if($request->ajax()){
    //         return redirect('/posts/'.$post_id);
    //     }
    //     return redirect('/posts/'.$post_id);
    // }

}
