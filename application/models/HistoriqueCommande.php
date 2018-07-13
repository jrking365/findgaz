<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class HistoriqueCommande extends Eloquent
{
    public $table = "Historiquecommande";
    
    public function commande() {
        return $this->belongsTo('Commande', 'commande');
    }
    
    public function etat() {
        return $this->belongsTo('Etat', 'etat');
    }
    
}