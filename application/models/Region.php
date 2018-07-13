<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Region extends Eloquent {

    protected $table = 'region';
    
    protected $fillable = ['code','libelle'];
    
    public $timestamps = false;
    
    public function departements(){
        return $this->hasMany('Departement', 'region');
    }
    
}

