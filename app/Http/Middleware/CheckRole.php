<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
            flash('Vous ne bénéficier pas suffisament de doits' )->warning();
            return redirect(url()->previous());
        }
        return $next($request);
    }
}
