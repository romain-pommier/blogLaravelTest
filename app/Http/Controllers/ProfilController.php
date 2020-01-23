<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function showProfil(){
        $user = User::find(auth()->id());

//        dump($user->articleComment);

        return view('profil',['user' => $user]);

    }

    public function setProfil(Request $request){


        $user = Auth::user();
        $request['user_id'] = $user;
        try{
            $avatar= $request->file('avatar');
            Storage::disk('local')->put('userAvatar', $avatar);
            $user->fill($request->except(['_token']));
            $user['avatar'] = Storage::url('userAvatar/'.$avatar->hashName());

            $user->save();
            flash("L'utilisateur ".$request['name'].' modifier avec success' )->success();

        }
        catch(\Illuminate\Database\QueryException $ex){
            flash('Formulaire non comforme')->error();
        }

      return redirect()->action( 'ProfilController@showProfil');
    }
}
