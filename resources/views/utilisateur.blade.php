@extends('layouts')

@section('contenu')
<div class="section">
    <h1 class="is-h1">
        {{$utilisateur->email}}
    </h1>

    @if (auth()->check() AND auth()->id() === $utilisateur->id )
    <form action="/messages" method="post">
        @csrf
        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" name="message" placeholder="envoyez des messages" cols="30"
                    rows="10"></textarea>
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
</div>
@endsection