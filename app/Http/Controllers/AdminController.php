<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Searchable;
use DB;
use App\User;
use App\Post;
use App\Tag;
use App\PostTag;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
#session_start();
class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->admin){
            $users = User::all();
            $posts = Post::all();
            $tags = Tag::all();
            $tags = $tags->SortByDesc('tag_id');


            $number_of_users = User::count();
            $number_of_posts = Post::count();
            $number_of_tags = Tag::count();
            return view('admin.home')
                ->with(compact('number_of_users', $number_of_users))
                ->with(compact('number_of_posts', $number_of_posts))
                ->with(compact('number_of_tags', $number_of_tags))
                ->with(compact('users', $users))
                ->with(compact('posts', $posts))
                ->with(compact('tags', $tags));
        }else{
            return redirect('/');
        }
    }

    public function delete($user_id){
        $user = User::find($user_id);
        if(!isset($user)){
            return redirect('/admin/home-page');
        }
        if($user->admin){
            return redirect('/admin/home-page')->with('alert','Cannot delete admin user!');
        }

        User::find($user_id)->delete();
        return redirect('/admin/home-page');

    }

}
