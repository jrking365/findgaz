<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Departement extends Eloquent {

    protected $table = 'departement';
    
    protected $fillable = ['code','libelle','region'];
    
    public $timestamps = false;
    
    public function communes(){
        return $this->hasMany('Commune', 'departement');
    }
    
    public function getRegion(){
        return $this->belongsTo('Region','region');
    }
}
