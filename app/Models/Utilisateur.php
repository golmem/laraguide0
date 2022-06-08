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

    protected $fillable = ['email', 'mot_de_passe', 'avatar'];

    /**
     * relation un à plusieurs
     */

    public function messages()
    {
        return $this->hasMany(Message::class)->latest();
    }

    /**
     * cette methode permet de creer la relation
     * un utilisateur peut suivre plusieurs utilisateurs
     * plusieur utilisateurs peuvent suivre un utilisateur
     * belongsToMany prend comme parametre le 
     *  1 - model de la table qui sera lié
     *  2 - la table pivot
     *  3 - la clé primaire de suivi de la premiere table
     *  4 - la clé primaire de suivi de la seconde table
     */
    public function suivis()
    {
        return $this->belongsToMany(Utilisateur::class, 'suivis', 'suiveur_id', 'suivi_id');
    }

    //la fonction pour savoir i un utilsateur est suivi ou pas

    public function suit($utilisateur)
    {
        return $this->suivis()->where('suivi_id', $utilisateur->id)->exists();
    }

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
