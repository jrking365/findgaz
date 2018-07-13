<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Annonce extends Eloquent
{
    public $table = "annonce";
    
    protected $fillable = ['societe','titre','description','datedebut','datefin','visibilite'];
    
    public $timestamps = false;
    
    public function piecejointe(){
        return $this->hasMany('Piecejointe', 'annonce') ;
    }
    
    public function getSociete() {
        return   $this->belongsTo('Societe', 'societe') ;
    }
}