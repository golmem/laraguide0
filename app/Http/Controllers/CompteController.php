<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompteController extends Controller
{
    //utilisation de la methode auth()->guest pour savoir si l'utilisateur est un invité
    public function accueil()
    {
        return view('mon-compte');
    }

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }

    public function mofificationMdp()
    {
        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        //v1
        /*$id = auth()->id();
        $utilisateur = Utilisateur::find($id);
        $utilisateur->mot_de_passe = bcrypt(request('password'));
        $utilisateur->save();*/

        //v2 recuperer l'id appel du model pour la requete
        $id = auth()->id();

        Utilisateur::where('id', $id)->update([
            'mot_de_passe' => bcrypt(request('password'))
        ]);

        flash('mdp modifer')->success();
        return back();
    }
}
