<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Utilisateur extends Eloquent {

    protected $table = 'utilisateur';
    
    protected $fillable = ['etat','pack','typeutilisateur','longitude','latitude','nom','prenom','statutmatrimonial','contact','email','numerocni','genre','profession','visibilite','login','motpasse'];
    
    public $timestamps = false;
    
    public static function connexionUser($l, $m){
        $result = Utilisateur::where('login', $l)
                       ->where('motpasse', $m)
                       ->get();
        if(sizeof($result)== 0)
            return false;
        else
            return true;
    }
    
    public static function getUtilisateur($l, $m){
        $result = Utilisateur::where('login', $l)
                       ->where('motpasse', $m)
                       ->get();
        return $result;
    }
    
    public function getEtat(){
        return $this->belongsTo('Etat', 'etat');
    }
    
    public function getPack(){
        return $this->belongsTo('Pack', 'pack');
    }
    
    public function getTypeUtilisateur(){
        return $this->belongsTo('TypeUtilisateur', 'typeutilisateur');
    }
    
    public function commandesClient(){
        return $this->hasMany('Commande', 'client');
    }
    
    public function commandesLivreur(){
        return $this->hasMany('Commande', 'livreur');
    }
    
    public function zonesAction(){
        return $this->hasMany('ZoneAction', 'livreur');
    }
    
    public function pointVenteLivreur(){
        return $this->belongsToMany('PointVente', 'ZoneAction', 'livreur', 'pointvente');
    }
    
    public function pointVenteFournisseur() {
        return $this->hasMany('PointVente', 'fournisseur');
    }

        public function page(){
        return $this->belongsToMany('Page', 'HistoriqueNavigation', 'utilisateur', 'page');
    }
    
    public function notationUtilisateur() {
        return $this->belongsToMany('Utilisateur', 'NotationUtilisateur', 'utilisateurnote', 'utilisateur2');
    }
    
    public function gaz() {
        return $this->belongsToMany('Gaz', 'Commande', 'client', 'gaz');
    }
    
    
}   
