<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    //affichage du formulair de connexion

    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        //regles de validation du formulaire de connexion
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //verifcation de la correspondance des données avec la fonction auth et sa methode attempt[()] qui renvoi un resultat 
        //donc faudrait penser à stocker cela dans une variable

        $resultat = auth()->attempt([
            'email' => request('email'),
            //password est un mot clé au niveau de la methode attempt laravel se chargera de chercher le mot de passe
            'password' => request('password')
        ]);

        if ($resultat) {
            //redirection si resultat renvoi true
            return redirect('/mon-compte');
        }

        //si resultat est false on retourne la page de connexion
        //avec l'ancien email renseigné grace à withInput, et on affiche un message d'erreur avec withErrors ([$cléChamp=>$message])
        return back()->withInput()->withErrors([
            'email' => 'vos identifiants sont incorrects'
        ]);
    }
}
