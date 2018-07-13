<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Commune extends Eloquent {

    protected $table = 'commune';
    
    protected $fillable = ['code','libelle','departement'];
    
    public $timestamps = false;
    
    public function quartiers(){
        return $this->hasMany('Quartier', 'commune');
    }
    
    public function getDepartement(){
        return $this->belongsTo('Departement','departement');
    }
    
}

