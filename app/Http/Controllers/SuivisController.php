<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class SuivisController extends Controller
{
    //methode pour permettre le suivis
    public function nouveau()
    {
        $utilisateurQuiVaSuivre = auth()->user();

        //on recupere les données de lutilisateur qui va etre suivis
        $utilisateurQuiVaEtreSuivis = Utilisateur::where('email', request('email'))->firstOrFail();
    }
}
