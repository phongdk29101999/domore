<?php

namespace App\Http\Controllers\Auth;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();      
        $follows = DB::table('followers')
                    ->join('users', 'followers.follows_id', '=', 'users.user_id')
                    ->where('followers.user_id', '=', $user->user_id)
                    ->where('follow_state', 1)
                    ->get();
        $follows_user = DB::table('followers')
                    ->join('users', 'followers.user_id', '=', 'users.user_id')
                    ->where('followers.follows_id', '=', $user->user_id)
                    ->where('follow_state', 1)
                    ->get();
        
        $check = 0;

        foreach($follows_user as $fl) {
            if( $fl->user_id == auth()->user()->user_id);
            $check = 1;
        }

        return view('user.user_profile')->with(compact(['posts', $posts], ['user', $user], ['follows', $follows], ['follows_user', $follows_user],['check', $check]));
    }

    public function follow(Request $request)
    {
        $follow_id = $request->follow_id;
        $user_id = auth()->user()->user_id;
        $current_state = DB::table('followers')->where('user_id', $user_id)->where('follows_id', $follow_id)->select('follow_state')->first();
        if (!$current_state) {
            Follow::create([
                'user_id' => $user_id,
                'follows_id' => $follow_id,
                'follow_state' => 1
            ]);
        } else if ($current_state->follow_state == 0) {
            DB::table('followers')->where('user_id', $user_id)->where('follows_id', $follow_id)->update(['follow_state' => 1]);
        } else {
            DB::table('followers')->where('user_id', $user_id)->where('follows_id', $follow_id)->update(['follow_state' => 0]);
        }

        $count_follow = DB::table('followers')->where('follows_id', $follow_id)->where('follow_state', 1)->count();

        if ($request->ajax()) {
            return $count_follow;
        }

        return redirect('/user/' . $follow_id);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit_user')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find(auth()->user()->user_id);

        if ($request->isMethod("POST")) {
            if ($request->hasFile('avatar_url')) {
                $filenameWithExt = $request->file('avatar_url')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar_url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('avatar_url')->storeAs('public/avatar_url', $filenameToStore);
                $user->avatar_url = $filenameToStore;
            }
            $request->validate([
                'phone' => 'min:8|numeric',
            ]);

            $user->last_name = $request->input('lastname');
            $user->first_name = $request->input('firstname');
            $user->birthday = $request->input('birthday');
            $user->gender = $request->input('gender');

            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
        }
        if ($request->input('pass0') && $request->input('pass1')) {
            $hashedPassword = $user->password;
            if (Hash::check($request->input('pass0'),$hashedPassword)) {
                if($request->input('pass1')==$request->input('pass2')){
                    $user->password = Hash::make($request->input('pass1'));
                    return redirect("/users/$user->user_id")->with('alert', 'Your password updated!!');

                }else{
                    return redirect("/users/$user->user_id/edit")->with('alert','Confirm password not match!!');
                }
            } else {
                // Current Password not match ps in db
                return redirect("/users/$user->user_id/edit")->with('alert', 'Your current password not correct!!');
            }
        }
        $user->save();
        return redirect("/users/$user->user_id");
    }

    public function posts($user_id)
    {
        $user = User::find($user_id);
        $posts = User::find($user_id)->posts;
        return view('user.posts')->with(compact(['posts', $posts], ['user', $user]));
    }

}
