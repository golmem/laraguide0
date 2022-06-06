<?php

namespace App\Http\Controllers;

use App\Mail\NouveauSuiveurMail;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuivisController extends Controller
{
    //methode pour permettre le suivis
    public function nouveau()
    {
        //recuperation des données de la personne connecté
        $utilisateurQuiVaSuivreId = Utilisateur::find(auth()->id());
        $utilisateurQuiVaSuivre = auth()->user();

        //on recupere les données de lutilisateur qui va etre suivis
        $utilisateurQuiVaEtreSuivis = Utilisateur::where('email', request('email'))->firstOrFail();

        //envoi de Mail
        Mail::to($utilisateurQuiVaEtreSuivis)->send(new NouveauSuiveurMail($utilisateurQuiVaSuivre));

        //on recupere tous les suivis et on les attachent
        $utilisateurQuiVaSuivreId->suivis()->attach($utilisateurQuiVaEtreSuivis);

        flash('suivis effectué avec succès')->success();
        return back();
    }

    public function enlever()
    {
        //recuperation des données de la personne connecté
        $utilisateurQuiSuitId = Utilisateur::find(auth()->id());

        //on recupere les données de lutilisateur qui va etre suivis
        $utilisateurSuivis = Utilisateur::where('email', request('email'))->firstOrFail();

        $utilisateurQuiSuitId->suivis()->detach($utilisateurSuivis);

        flash('vous ne suivez plus cet utilisateur : ' . $utilisateurSuivis->email)->info();
        return back();
    }
}
