@extends('layouts')
{{-- la directive extends('layouts') fait appel au fichier de base layouts et de sa structure --}}

@section('contenu')
{{-- la directive section montre ou doit etre placé le code pour etre compris par le yield --}}

{{-- formulaire d'inscription --}}
<form action="" method="post" class="column is-half mx-auto">

    {{-- pour des raisons de securité laravel impose l'utilisation de la directive @csrf dans les formulaires --}}
    @csrf

    {{-- affichage des erreurs
    @if($errors->has('email')) cette ligne signifie si la variable errors à une erreur pour mon champ email
    --}}
    <input class="mt-3 input is-link" type="email" name="email" placeholder="adresse electronique"
        value="{{old('email')}}">

    {{-- affiche la premiere erreur du champ email
    recuperation de l'ancienne valeur du champ email rentré en cas d'erreur
    --}}
    @if($errors->has('email'))
    <p class="help is-danger">{{$errors->first('email')}}</p>
    @endif

    <p class="mt-3"><input class="input is-link" type="password" name="password" placeholder="mot de passe"></p>

    {{-- affiche la premiere erreur du champ email --}}
    @if($errors->has('password'))
    <p class="help is-danger">{{$errors->first('password')}}</p>
    @endif

    <p class="mt-5"><input class="button is-link" type="submit" value="connexion"></p>
</form>

@endsection