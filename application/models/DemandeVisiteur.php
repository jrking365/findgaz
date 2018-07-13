<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class DemandeVisiteur extends Eloquent {

    protected $table = 'demandevisiteur';
    
    protected $fillable = ['etat','pack','typeutilisateur','longitude','latitude','nom','prenom','contact','email','numerocni','genre','profession','visibilite','login','motpasse','statutmatrimonial'];
    
    public $timestamps = false;
    
    public function utilisateur() {
        return $this->hasOne('utilisateur', 'id');
    }
    
}   
