<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class PointVenteGaz extends Eloquent
{
    public $table = "pointvente_gaz";
    
    protected $fillable = ['pointvente','etat','gaz','disponibilite', 'quantite', 'visibilite'];
    
    public $timestamps = false;
    
    public function getEtat() {
        return $this->belongsTo('Etat', 'etat');
    }
    
    public function getPointVente() {
        return $this->belongsTo('PointVente', 'pointvente');
    }
    
    public function getGaz() {
        return $this->belongsTo('Gaz', 'gaz');
    }
    
}