@extends('layouts')

@section('contenu')
@auth
<table class="table">
    <thead>
        <th>liste des utilisateurs suivis</th>
    </thead>

    @if (auth()->user()->suivis->isEmpty())
    <tr>
        <td>
            vous ne suivez aucun utilisateur
        </td>
    </tr>
    @else

    @foreach (auth()->user()->suivis as $utilisateur)
    <tr>
        <td>
            <a href="/{{$utilisateur->email}}">
                {{$utilisateur->email}}
            </a>
        </td>
    </tr>
    @endforeach
    @endif
</table>
@endauth

<table class="table">
    <thead>
        <th>liste des utilisateurs</th>
    </thead>
    @foreach ($utilisateurs as $utilisateur)
    <tr>
        <td>
            <a href="/{{$utilisateur->email}}">
                {{$utilisateur->email}}
            </a>
        </td>
    </tr>
    @endforeach

</table>
@endsection