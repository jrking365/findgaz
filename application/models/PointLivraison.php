<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class PointLivraison extends Eloquent
{
    public $table = "pointlivraison";
    
    protected $fillable = ['quartier','libelle','description','longitude','latitude','visibilite'];
    
    public $timestamps = false;
    
    public function getQuartier() {
        return $this->belongsTo('Quartier', 'quartier');
    }
    
    public function commandes() {
        return $this->hasMany('Commande', 'pointlivraison');
    }
    
}