<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use phpDocumentor\Reflection\Types\Compound;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class HomeController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function homepage()
    {
        $comment_count = array();
        $like_count = array();
        $posts = Post::where("isPublic", "=", true)->get();
        if ($posts->count() !== 0) {
            for ($i = 0; $i < sizeof($posts); $i ++) {
                $posts[$i]["comment_count"] = DB::table('comments')
                    ->join('posts', 'comments.post_id', '=', 'posts.post_id')
                    ->where('posts.post_id', '=', $posts[$i]->post_id)
                    ->count();
                $posts[$i]["like_count"] = DB::table('user_post_like')
                    ->where('post_id', $posts[$i]->post_id)
                    ->where('like_state', 1)
                    ->count();
            }
            $posts = $posts->sortByDesc(function ($post, $key) {
                return $post->comment_count;
            });
        }
        return view('user.home', compact('posts'));
    }

    public function index()
    {
        if (Auth::user() && Auth::user()->admin) {
            return redirect('/admin/home-page');
        } else {
            $posts = Post::orderBy('date_create', 'desc')->take(3)->get();
            return view('user.home', compact('posts'));
        }
    }
}
