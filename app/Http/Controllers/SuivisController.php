<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class SuivisController extends Controller
{
    //methode pour permettre le suivis
    public function nouveau()
    {
        //recuperation des données de la personne connecté
        $utilisateurQuiVaSuivreId = Utilisateur::find(auth()->id());

        //on recupere les données de lutilisateur qui va etre suivis
        $utilisateurQuiVaEtreSuivis = Utilisateur::where('email', request('email'))->firstOrFail();


        $utilisateurQuiVaSuivreId->suivis()->attach($utilisateurQuiVaEtreSuivis);

        flash('suivis effectué avec succès')->success();
        return back();
    }
}
