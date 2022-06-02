@extends('layouts')
{{-- la directive extends('layouts') fait appel au fichier de base layouts et de sa structure --}}

@section('contenu')
{{-- la directive section montre ou doit etre placé le code pour etre compris par le yield --}}

{{-- formulaire d'inscription --}}
<form action="" method="post">

    {{-- pour des rasons de securité laravel impose l'utilisation de la directive @csrf dans les formulaires --}}
    @csrf
    <input type="email" name="email" placeholder="adresse electronique">
    <input type="password" name="password" placeholder="mot de passe">
    <input type="password" name="password_confirmation" placeholder="confirmer">
    <input type="submit" name="submit" value="envoyer">
</form>

@endsection