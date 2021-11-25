<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Posttag;
use App\Post;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # Create new tag
    public function create(Request $request)
    {
        $tags = Tag::all();
        $tags = $tags->SortByDesc('tag_id');

        if ($request->isMethod('post')) {
            $tag = new Tag();
            $tag->tag_title = $request->title;
            $request->validate(['title' => "required|max:30|min:1|unique:tags,tag_title"]);
            $tag->save();
            return redirect('tags/new')->with(compact('tags', $tags));    
        }
        return view('tag.new')->with(compact('tags', $tags));
    }

    # Get tag by id
    public function show($tag_id)
    {
        $tag = Tag::find($tag_id);
        if(!isset($tag)){
            return redirect('/');
        }
        $posts = $tag->posts->all();
        return view('tag.show')
                ->with(compact('tag', $tag))
                ->with(compact('posts', $posts));
    }

    # Edit post
    public function edit(Request $request,$tag_id){
        $tag = Tag::find($tag_id);
        if(!isset($tag)){
            return redirect('/');
        }
        $tags = Tag::all();
        $tags = $tags->SortByDesc('tag_id');
        if($request->isMethod('post')){
            $request->validate(['title' => "required|max:30|min:3|unique:tags,tag_title"]);
            $tag->tag_title = $request->title;
            $tag->save();
            return redirect("tags/$tag->tag_id/edit")
                    ->with(compact('tags', $tags))
                    ->with(compact('tag',$tag));
        }
        return view('tag.edit')->with(compact('tag',$tag))->with(compact('tags',$tags));
    }

    # Delete tag
    public function delete($tag_id)
    {
        $tag = Tag::find($tag_id);
        if(!isset($tag)){
            return redirect('/');
        }
        Tag::where('tag_id', $tag_id)->delete();
        return redirect('/admin/home-page');
    }
}
