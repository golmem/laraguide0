@extends('layouts')
{{-- la directive extends('layouts') fait appel au fichier de base layouts et de sa structure --}}

@section('contenu')
<h2>mauvaise methode</h2>
{{--
recupération du nom directement avec la fonction request
mauvaise pratique
les vues affichent juste
--}}
<h2>{{request('nom')}}</h2>

<hr>

<h2>♦ bonne methode ♦</h2>
<h2>{{$nom}}</h2>

@endsection