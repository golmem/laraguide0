<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    //
    public function liste()
    {

        $messages =  auth()->user()->suivis->load->map->messages->flatten()->sortByDesc->created_at;

        return view('actualites', ['messages' => $messages]);
    }
}
