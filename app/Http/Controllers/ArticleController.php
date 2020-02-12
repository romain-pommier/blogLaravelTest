<?php

namespace App\Http\Controllers;


use App\Article;
use App\Comment;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
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
        $article = Article::where('title', $title)->first();
        $user = $article->user;
        $comments = $article->comments;

        return view('article',[
            'article' => $article,
            'user' => $user,
            'currentUser' => auth()->check(),
            'comments' => $comments
            ]
        );

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

//       AJOUT ET SAUVEGARDE DES TAGS PLUS INCRÉMENTATION D'UN TABLEAU D'ID DE TAG





//        $validator = Validator::make($request->all(), [
//            'title' => 'required|unique:articles|max:2',
//            'picture' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('updateorcreatearticles')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $arrayIdTags = [];
        if($request->tags != null){

            foreach ($request->tags as $tag) {
                $currentTag = Tag::where('name',$tag)->first();
                if ($currentTag == null){
                    $currentTag = new Tag();
                }
                $currentTag->fill(['name' => $tag]);
                $currentTag->save();
                array_push($arrayIdTags,$currentTag->id);
            }
        }

//      AJOUT D'UN ARTICLE + SYNC AVEC LES TABLEAU D'ID DES TAGS
        $request['user_id'] = $currentUser;
        try{
            $article->fill($request->except(['_token']));
            $article->tags()->sync($arrayIdTags);
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
    //    ---------------------------DELETE-------------------------
//---------------------------------------------------------------
    public function delete(Request $resquest, $id){
        $articleDelete = Article::find($id);

        try{
            $articleDelete->delete();
            return redirect()->action( 'ArticlesController@show');
            flash('Article '.$request['title'].' supprimer avec success' )->success();
        }
        catch(\Illuminate\Database\QueryException $ex){
            flash('Articles supprimer avec success');

        }


    }
}
