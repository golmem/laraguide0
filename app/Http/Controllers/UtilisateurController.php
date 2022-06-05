<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

        /*utilisation de la methode where sur le model utilisateur qu'on va affecté a la variable utilisateur
        /where contient en param1 le nom du champ dans la bd et en second la valeur requise first dit que l'on recupere la première ligne 
        renvoi une erreur 404 si l'utilisateur n'existe pas
        */
        $utilisateur = Utilisateur::where('email', $email)->firstOrFail();
        //recuperation de tous les messages à afficher avec get les nouveux messages seront les premiers

        //$messages = Message::where('utilisateur_id', $utilisateur->id)->orderByDesc('created_at')->get();

        //pareil que orderByDesc
        $messages = Message::where('utilisateur_id', $utilisateur->id)->latest()->get();

        return view('utilisateur', [
            'utilisateur' => $utilisateur,
            'messages' => $messages
        ]);
    }
}
