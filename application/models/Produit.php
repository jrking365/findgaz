<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Produit extends Eloquent
{
    public $table = "produit";
    
    protected $fillable = ['societe','code','libelle','description','visibilite'];
    
    public $timestamps = false;
    
    public function getSociete() {
        return $this->belongsTo('Societe', 'societe');
    }
    
    public function listeGaz() {
        return $this->hasMany('Gaz','produit') ;
    }
    
}