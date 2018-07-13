<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class TypeUtilisateurPack extends Eloquent
{
    public $table = "typeutilisateur_pack";
    
    public function fonctionnalite() {
        return $this->belongsToMany('Fonctionnalite', 'FonctionnaliteTypeUtilisateurPack', 'typeutilisateurpack', 'fonctionnalite');
    }
    
}