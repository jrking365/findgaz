<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once('Eloquent.php');

use Illuminate\Database\Eloquent\Model as Eloquent;

class HistoriqueVisite extends Eloquent {

    public $table = "historique_visite";
    
    protected $fillable = ['visiteur', 'page', 'datevisite'];
    
    public $timestamps = false;
    
    public function getVisiteur(){
        return $this->belongsTo('Visiteur', 'visiteur');
    }
    
    public function getPage() {
        return $this->belongsTo('Page', 'page');
    }

}
