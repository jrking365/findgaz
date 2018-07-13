<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Gaz extends Eloquent
{
    public $table = "gaz";
    
    protected $fillable = ['produit','formatproduit','prix_unitaire'];
    
    public $timestamps = false;
    
    public function pointVente() {
        return $this->belongsToMany('PointVente', 'PointVenteGaz', 'gaz', 'pointvente');
    }
    
    public function client() {
        return $this->belongsToMany('Utilisateur', 'Commande', 'gaz', 'client');
    }
    
    public function produit(){
        return $this->belongsToMany('Produit', 'FormatProduit', 'gaz', 'produit');
    }
    
    public function getProduit(){
        return $this->belongsTo('Produit', 'produit');
    }
    public function getFormatProduit() {
        return $this->belongsTo('FormatProduit', 'formatproduit');
    }
    
}