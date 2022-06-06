@extends('layouts')
{{-- la directive extends('layouts') fait appel au fichier de base layouts et de sa structure --}}

@section('contenu')
{{-- la directive section montre ou doit etre placé le code pour etre compris par le yield --}}
<h2>mon compte</h2>
<p>c'est votre compte</p>
{{-- affichage du message flash --}}

<form action="/modification-mdp" method="POST" class="section">
    @csrf
    <legend>modifier le mot de passe</legend>
    <p class="mt-3"><input class="input is-link" type="password" name="password" placeholder="nouveau mot de passe"></p>

    {{-- affiche la premiere erreur du champ email --}}
    @if($errors->has('password'))
    <p class="help is-danger">{{$errors->first('password')}}</p>
    @endif

    <p class="mt-3"><input class="input is-link" type="password" name="password_confirmation"
            placeholder="confirmer mot de passe"></p>

    {{-- affiche la premiere erreur du champ email --}}
    @if($errors->has('password_confirmation'))
    <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
    @endif

    <p class="mt-5"><input class="button is-link" type="submit" value="modifier le mdp"></p>
</form>
@endsection