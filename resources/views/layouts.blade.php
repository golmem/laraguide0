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
        <h1>i am the header</h1>
    </header>
    <hr>
    <div class="container">
        {{-- la directive yield fais comprendre que le contenu des pages sera en sont sein --}}
        @yield('contenu')
    </div>
    <hr>
    <footer>
        <p>&copy;Copyright unlimited footer</p>
    </footer>
</body>

</html>