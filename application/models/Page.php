<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Page extends Eloquent
{
    public $table = "page";
    
     protected $fillable = ['description','libelle','visibilite'];
    
    public $timestamps = false;
    
    public function visiteur() {
        return $this->belongsToMany('Visiteur', 'HistoriqueVisite', 'page', 'visiteur');
    }
    
    public function utilisateur() {
        return $this->belongsToMany('Utilisateur', 'HistoriqueNavigation', 'page', 'utilisateur');
    }
    
}