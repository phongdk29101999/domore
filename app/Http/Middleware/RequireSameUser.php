<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RequireSameUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = $request->id;
        $user = User::find($user_id);
        if($user != auth()->user()){
            return redirect('/');
        }
        return $next($request);
    }
}
