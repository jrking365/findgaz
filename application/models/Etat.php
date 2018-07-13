<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Etat extends Eloquent
{
    public $table = "etat";
    
    public function commande() {
        return $this->hasMany('Commande', 'etat');
    }
    
    public function historiqueCommande() {
        return $this->hasMany('HistoriqueCommande', 'etat');
    }
    
    public function typeEtat() {
        return $this->belongsTo('TypeEtat', 'typeetat');
    }
    
    public function pointVenteGaz() {
        return $this->hasMany('PointVenteGaz', 'etat');
    }
    
    public function utilisateur() {
        return $this->hasMany('Utilisateur', 'etat');
    }
    
}