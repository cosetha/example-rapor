<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,... $roles)
    {
        $user = Auth::user();
        if($user->level == "Admin")
            return $next($request);

        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if($role == "Walikelas" && $user->Guru()->count() >0 ){
                return $next($request);
            }
            if($role == "BK" && $user->Guru()->first()->is_bk == 'Y' ){
                return $next($request);
            }
            if($user->level == $role){
                return $next($request);
            }
                
        }

            return redirect('login');
    }
}
