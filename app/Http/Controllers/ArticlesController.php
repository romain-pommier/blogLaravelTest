<?php

namespace App\Http\Controllers;

use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Article;

class articlesController extends Controller
{

    //    -----------------------------SHOW-------------------------
    //---------------------------------------------------------------
    public function show()
    {
        $articles = Article::get();

        return view('articles',['articles' => $articles,'user' => auth()->check()]);
    }
    public function showArticle()
    {
        $title = request('title');

        $article = \DB::table('articles')->where('title', $title)->first();

        $user = \DB::table('users')->where('id',$article->id_user)->first();


        return view('article',['article' => $article,
            'user' => $user]);

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

        $article = $id ===null ? new Article() : Article::find($id);
        $request['id_user'] = $currentUser;

        try{

            $article->fill($request->except(['_token']));
//            $article->fill($request->user($currentUser));
//            dd($request);
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
