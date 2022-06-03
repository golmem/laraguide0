<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    //methode pour afficher le formulaire
    public function formulaire()
    {
        return view('inscription');
    }

    //methode pour traitement et insertion du formulaire
    public function traitement()
    {

        //methode validate([$clé => $valeur])
        request()->validate([
            'email' => ['required', 'email', 'unique:utilisateurs,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ], [
            //message personnalisé
            'password.min' => 'pour des raisons de securité votre mot de passe doit avoir au moins :min caractères'
        ]);

        //insertion de l'utilisateur
        $utilisateur = Utilisateur::create([
            'email' => request('email'),
            'mot_de_passe' => bcrypt(request('password'))
        ]);


        return "nous avons recu votre inscription";
    }
}
