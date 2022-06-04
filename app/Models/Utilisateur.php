<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable
{
    use HasFactory;
    /*pour utiliser les differentes fonctions de authenticatable on va utiliser le trait authenticatable
    renommé en AuthAuthenticatable
    */
    use AuthAuthenticatable;

    protected $fillable = ['email', 'mot_de_passe'];

    /*
    redefinition de la fonction getAuthPassword
    */
    public function getAuthPassword()
    {
        //ca retourne le champ mot_de_passe de la bd
        return $this->mot_de_passe;
    }

    //on utilise pas la methode se souvenir de moi donc on retourne une chaine vide pour eviter les erreurs
    public function getRememberTokenName()
    {
        return '';
    }
}
