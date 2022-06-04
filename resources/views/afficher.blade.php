@extends('layouts')

@section('contenu')
<table class="table">
    <thead>
        <th>email</th>
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