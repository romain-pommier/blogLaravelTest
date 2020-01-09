<?php

namespace App\Http\Controllers;

use App\Article;
use function auth;
use function flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function request;
use function view;

class ArticleController extends Controller
{
    public function showArticle()
    {
        $title = request('title');

        $article = \DB::table('articles')->where('title', $title)->first();

        $user = \DB::table('users')->where('id',$article->id_user)->first();


        return view('article',['article' => $article,
            'user' => $user, 'currentUser' => auth()->check()]);

    }
    //    -----------------------------UPDATE-------------------------
    //---------------------------------------------------------------
    public function articleForm(Request $request, $id = null)
    {
        if($id){
            $article = Article::find($id);
        }
        else{
            $article = new Article();
        }
        return view('addArticles',['article' => $article]);
    }

    public function createOrUpdate(Request $request , $id = null)
    {

        $currentUser = Auth::user()->id;

        $article = $id === null ? new Article() : Article::find($id);
        $request['id_user'] = $currentUser;

        try{

            $article->fill($request->except(['_token']));
            $article->save();
            flash('Article '.$request['title'].' ajouter avec success' )->success();

        }
        catch(\Illuminate\Database\QueryException $ex){
            flash('Formulaire non comforme')->error();
        }

        return redirect()->action( 'ArticlesController@show');
    }

//    -----------------------------ADD-------------------------
//---------------------------------------------------------------
    public function addForm()
    {

        return view('addArticles');
    }
}
