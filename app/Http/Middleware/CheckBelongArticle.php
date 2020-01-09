<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CheckBelongArticle
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
//        if(Route::current()->parameters() == null){
//            dd('null');
//        }
//        else{
//            dd('is ok');
//        }

        $idArticle = Route::current()->parameters();
        $currentIdUser = Auth::user();

        $articleSelect = intval(DB::table('articles')->where('id', $idArticle)->first()->id_user);

        if($articleSelect != null){
            if($articleSelect != $currentIdUser['id']){
                flash('Vous ne bénéficier pas suffisament de doits' )->error();
                return redirect(url()->previous());
            }
        }

        return $next($request);
    }
}
