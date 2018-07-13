<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class PieceJointe extends Eloquent
{
    public $table = "piecejointe";
    
    protected $fillable = ['annonce','libelle'];
    
    public $timestamps = false;
    
    public function getAnnonce(){
        return $this->belongsTo('Annonce', 'annonce') ;
    }
}