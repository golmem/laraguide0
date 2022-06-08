<h1>hello</h1>
<p>l'utilisateur {{$suiveur->email}} a commencé a vous suivre</p>
{{--

markdown

@component('mail::message')
# hello

l'utilisateur *{{$suiveur->email}}* a commencé a vous suivre


Thanks,<br>
{{ config('app.name') }}
@endcomponent
--}}