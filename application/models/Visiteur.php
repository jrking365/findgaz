<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Visiteur extends Eloquent
{
    public $table = "visiteur";
    
    protected $fillable = ['adressemac','email','message','verification'];
    
    public $timestamps = false;
    
    public function page() {
        return $this->belongsToMany('Page', 'HistoriqueVisite', 'visiteur', 'page');
    }
    
}