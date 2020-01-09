<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $currentUser = Auth::user();
        if($currentUser['id_role'] == intval($role) || $currentUser == null){
             return redirect('home');
        }

        return $next($request);
    }
}
