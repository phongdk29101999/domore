<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Expr\New_;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->stateless()->redirect();
    // }
    // public function handleGoogleCallback()
    // {
    //     $user = Socialite::driver('google')->stateless()->user();
    //     $this->_registerUser($user);
    //     return redirect()->route('home');

    //     // $user->token;
    // }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->stateless()->redirect();
    // }

    // public function handleFacebookCallback()
    // {
    //     $user = Socialite::driver('facebook')->stateless()->user();
    //     $this->_registerUser($user);
    //     return redirect()->route('home');

    //     // $user->token;
    // }

    // public function _registerUser($data)
    // {
    //     $user = User::where('email', "=", '$data->email')->first();
    //     if(!$user){
    //         $user = New User();
    //         $user->name = $data->user_name;
    //         $user->email = $data->email;
    //         $user->save();
    //     }
    //     Auth::login($user);
    // }
}
