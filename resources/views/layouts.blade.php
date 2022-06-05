<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Laravel</title>
</head>

<body class="container">

    {{-- preparation du plan de travail de base ou modele de depart de toutes les pages àvenir --}}
    <header>
        {{-- le conteneur--}}
        <nav class="navbar is-light mt-5">
            {{-- le menu --}}
            <div class="navbar-menu mt-2 p-2">

                {{-- partie gauche du menu --}}
                <div class="navbar-start">
                    <a href="/" class="navbar-item {{request()->is('/')?'is-active':''}}">Accueil</a>
                </div>

                {{-- condition au cas où la personne est connecté ou pas --}}
                {{-- activation du lien actif avec la methode request()->is('nom de la route') --}}
                @if (auth()->check())
                {{-- partie droite du menu --}}
                <div class="navbar-end">
                    <a href="/mon-compte" class="navbar-item {{request()->is('mon-compte')?'is-active':''}}">Mon
                        Compte</a>
                    <a href="/deconnexion" class="navbar-item">Deconnexion</a>
                </div>
                @else
                {{-- partie droite du menu --}}
                <div class="navbar-end">
                    <a href="/inscription"
                        class="navbar-item {{request()->is('inscription')?'is-active':''}} ">Inscription</a>
                    <a href="/connexion" class="navbar-item {{request()->is('connexion')?'is-active':''}}">Connexion</a>
                </div>
                @endif
            </div>
        </nav>
    </header>
    <hr>
    <div class="container">
        <div class="my-2 message is-primary">
            @include('flash::message')
        </div>
        {{-- affichage du message flash d'erreur --}}
        @if (session()->has('error'))
        <div class="notification is-danger">
            <p>{{session()->get('error')}}</p>
        </div>
        @endif

        {{-- la directive yield fais comprendre que le contenu des pages sera en sont sein --}}
        @yield('contenu')

    </div>
    <hr>
    <footer>
        <p>&copy;Copyright unlimited footer</p>
    </footer>
</body>

</html>