<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeUtilisateur extends Eloquent {
    
    protected $table = 'typeutilisateur';
    
    protected $fillable = ['code','libelle','description','visibilite'];
    
    public $timestamps = false;
    
    public function utilisateur(){
        return$this->hasMany('Utilisateur','typeutilisateur');
    }
    
    public function pack() {
        return $this->belongsToMany('Pack', 'TypeUtilisateurPack', 'typeutilisateur', 'pack');
    }
    
}

