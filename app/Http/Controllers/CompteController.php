<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    //utilisation de la methode auth()->guest pour savoir si l'utilisateur est un invité
    public function accueil()
    {

        if (auth()->guest()) {
            return redirect('/connexion')->withErrors([
                'email' => 'vous devez vous connecter pour acceder au profil'
            ]);
        }
        return view('mon-compte');
    }

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }
}
