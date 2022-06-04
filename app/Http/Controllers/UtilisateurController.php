<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //function listant les utilisateurs
    public function liste()
    {
        $utilisateurs = Utilisateur::all();
        return view('afficher', ['utilisateurs' => $utilisateurs]);
    }

    public function voir()
    {
        //variable email recuperant l'adresse email
        $email = request('email');

        //utilisation de la methode where sur le model utilisateur qu'on va affecté a la variable utilisateur
        //where contient en param1 le nom du champ dans la bd et en second la valeur requise first dit que l'on recupere la première ligne 
        $utilisateur = Utilisateur::where('email', $email)->first();

        return view('utilisateur', ['utilisateur' => $utilisateur]);
    }
}
