{{--
url permet de regler le probleme de chemoin
$lien se chargera de receuillir le lien
$texte se chargera de receuillir le texte du lien
activation du lien actif avec la methode request()->is('nom de la route')
--}}
<a href="{{url($lien)}}" class="navbar-item {{request()->is($lien ? 'is-active' : '')}}">{{$texte}}</a>