<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Fonctionnalite extends Eloquent
{
    public $table = "fonctionnalite";
    
    public function typeUtilisateurPack() {
        return $this->belongsToMany('TypeUtilisateurPack', 'FonctionnaliteTypeUtilisateurPack', 'fonctionnalite', 'typeutilisateurpack');
    }
    
}