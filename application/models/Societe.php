<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Societe extends Eloquent
{
    public $table = "societe";
    
    protected $fillable = ['nom','libelle','description','logo','slogan','siteweb','contact','boitepostal','email','visiblite'];
    
    public $timestamps = false;
    
    public function annonce() {
        return $this->hasMany('Annonce', 'societe');
    }
    
    public function produit() {
        return $this->hasMany('Produit', 'societe');
    }
    
}