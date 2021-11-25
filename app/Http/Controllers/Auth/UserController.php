<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('user.user_profile')->with('user', $user);
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
