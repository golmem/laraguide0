@extends('layouts')

@section('contenu')
<table>
    <thead>
        <th>email</th>
    </thead>
    @foreach ($utilisateurs as $utilisateur)
    <tr>
        <td>{{$utilisateur->email}}</td>
    </tr>
    @endforeach

</table>
@endsection