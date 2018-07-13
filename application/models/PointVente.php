<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class PointVente extends Eloquent
{
    public $table = "pointvente";
    
    protected $fillable = ['quartier','fournisseur','nom','longitude','latitude','description', 'visibilite','etat'];
    
    public $timestamps = false;
    
    public function gaz() {
        return $this->belongsToMany('Gaz', 'PointVenteGaz', 'pointvente', 'gaz');
    }
    
    public function livreur() {
        return $this->belongsToMany('Utilisateur', 'ZoneAction', 'pointvente', 'livreur');
    }
    
    public function fournisseur() {
        return $this->belongsTo('Utilisateur', 'fournisseur') ;
    }
    
    public function quartier() {
        return $this->belongsTo('Quartier', 'quartier');
    }
    
    public function getEtat() {
        return $this->belongsTo('Etat','etat');
    }
    
}