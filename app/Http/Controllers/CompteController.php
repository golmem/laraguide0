<?php

namespace App\Http\Controllers;


class CompteController extends Controller
{
    //utilisation de la methode auth()->guest pour savoir si l'utilisateur est un invité
    public function accueil()
    {

        if (auth()->guest()) {
            /*
            premiere facon de definir un message flash ===> 
                Session::flash('error', 'vous devez vous connecter');
                return redirect('/connexion');
            */

            //deuxieme methode sur une ligne
            return redirect('/connexion')->with('error', 'vous devez vous connecter');
        }
        return view('mon-compte');
    }

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }
}
