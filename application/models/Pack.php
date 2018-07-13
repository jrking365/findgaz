<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Pack extends Eloquent
{
    public $table = "pack";
    
    public function typeUtilisateur() {
        return $this->belongsToMany('TypeUtilisateur', 'TypeUtilisateurPack', 'pack', 'typeutilisateur');
    }
    
    public function utilisateur() {
        return $this->hasMany('Utilisateur', 'pack');
    }
    
}