@extends('layouts')

@section('contenu')
<div class="section">
    <h1 class="is-h1">
        {{$utilisateur->email}}
    </h1>
</div>
@endsection