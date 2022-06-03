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
}
