<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once('Eloquent.php');

use Illuminate\Database\Eloquent\Model as Eloquent;

class HistoriqueNavigation extends Eloquent {

    public $table = "historiquenavigation";
    
    protected $fillable = ['page','utilisateur','datenavigation'];
    
    public $timestamps = false;
    
    public function getUtilisateur(){
        return $this->belongsTo('Utilisateur', 'utilisateur');
    }
    
    public function getPage() {
        return $this->belongsTo('Page', 'page');
    }

}
