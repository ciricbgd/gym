<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
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
        if($request->session()->has('user')){
            $user = $request->session()->get('user')[0];
            if($user->role_id > 0){
                return $next($request);
            } else {
                return abort(404, 'You do not have the rights to access this page.');
            }
        }

        return abort(404, 'You do not have the rights to access this page.');
    }
}
