@extends('layouts')

@section('contenu')
<div class="section">
    <h1>Actualités</h1>
    @foreach ($messages as $message)
    <div class="message mt-5 mb-2 is-primary">
        <div class="message-header">
            <p>ecrit par : {{$message->utilisateur->email}}</p>
            <p>le : <strong>{{$message->created_at->format('d/m/y H : i')}}</strong></p>

        </div>
        <div class="message-body">

            <p>
                {{$message->contenu}}
            </p>
        </div>
    </div>
    <hr>
    @endforeach

</div>
@endsection