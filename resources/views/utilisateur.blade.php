@extends('layouts')

@section('contenu')
<div class="section">
    <h1 class="is-1 level">
        <div class="level-left">

            <div class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img src="/storage/{{$utilisateur->avatar}}" alt="image d'avatar">
                    </figure>
                </div>
                <div class="media-content">
                    <h1 class="title is-1"> {{$utilisateur->email}}</h1>
                </div>
            </div>

            @auth
            <div class="level-item">
                <form method="POST" action="/{{$utilisateur->email}}/suivis">
                    @csrf

                    @if (auth()->user()->suit($utilisateur))
                    @method('delete')
                    @endif

                    <button class="button is-primary" type="submit">
                        @if (auth()->user()->suit($utilisateur))
                        ne plus suivre
                        @else
                        Suivre
                        @endif
                    </button>
                </form>
            </div>
            @endauth

        </div>
    </h1>

    @if (auth()->check() AND auth()->id() === $utilisateur->id )
    <form action="/messages" method="post">
        @csrf
        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" name="message" placeholder="envoyez des messages" cols="15"
                    rows="5"></textarea>
            </div>
            @if ($errors->has('message'))
            <p class="is-danger">{{$errors->first('message')}}</p>
            @endif
        </div>
        <div class="field">
            <input class="button is-link" type="submit" value="publier">
        </div>
    </form>
    @endif

    @foreach ($utilisateur->messages as $message)
    <div class="message mt-5 mb-2 is-primary">
        <p>Autheur du message : {{$message->utilisateur->email}}</p>
        <p class="message-header">message envoyé le :
            <strong>{{$message->created_at}}</strong>
        </p>
        <p class="message-body">{{$message->contenu}}</p>
    </div>
    <hr>
    @endforeach

</div>
@endsection