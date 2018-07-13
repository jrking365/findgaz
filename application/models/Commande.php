<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Commande extends Eloquent
{
    public $table = "commande";
     protected $fillable = ['livreur','pointlivraison','packlivraison','client','etat','gaz','quantite','prix','dateCommande'];
    
    public $timestamps = false;
    
    public function pointLivraison() {
        return $this->belongsTo('PointLivraison', 'pointlivraison');
    }
    
    public function livreur() {
        return $this->belongsTo('Utilisateur', 'livreur');
    }
    
    public function getClient(){
        return $this->belongsTo('Utilisateur','client');
    }

        public function packLivraison() {
        return $this->belongsTo('PackLivraison', 'packlivraison');
    }
    
    public function historiqueCommande() {
        return $this->hasMany('HistoriqueCommande', 'commande');
    }
   

        public function etat() {
        return $this->belongsTo('Etat', etat);
    }
    
}