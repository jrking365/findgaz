<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once('Eloquent.php');

use Illuminate\Database\Eloquent\Model as Eloquent;

class PackLivraison extends Eloquent {

    public $table = "packlivraison";
    
    protected $fillable = ['libelle', 'code', 'description','prix_packlivraison', 'visibilite'];
    
    public $timestamps = false;

    public function commande() {
        return $this->hasMany('Commande', 'packlivraison');
    }

}
