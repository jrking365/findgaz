<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Quartier extends Eloquent
{
    public $table = "quartier";
    
    protected $fillable = ['nom','description','visibilite','commune'];
    
    public $timestamps = false;
    
    public function pointVente() {
        return $this->hasMany('PointVente', 'quartier');
    }
    
    public function pointLivraison() {
        return $this->hasMany('PointLivraison', 'quartier');
    }
    
    public function getCommune(){
        return $this->belongsTo('Commune','commune');
    }
    
}