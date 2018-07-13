<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class FormatProduit extends Eloquent
{
    public $table = "formatproduit";
    
    protected $fillable = ['code','masse','unite','visibilite'];
    
    public $timestamps = false;
    
    public function produit() {
        return $this->belongsToMany('Produit', 'Gaz', 'formatproduit', 'produit') ;
    }
    
}