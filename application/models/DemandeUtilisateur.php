<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class DemandeUtilisateur extends Eloquent {

    protected $table = 'demandeutilisateur';
    
    protected $fillable = ['etat','pack','typeutilisateur','longitude','latitude','nom','prenom','contact','email','numerocni','genre','profession','visibilite','login','motpasse','statutmatrimonial'];
    
    public $timestamps = false;
    
    public function utilisateur() {
        return $this->hasOne('utilisateur', 'id');
    }
    
}   
