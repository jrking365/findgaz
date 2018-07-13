<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class ZoneAction extends Eloquent
{
    public $table = "zoneaction";
    protected  $fillable = ['pointvente','livreur','code','libelle','description'];
    public $timestamps = false;
    
     public function  getAllZone(){
        $result = ZoneAction::where(!empty('livreur'))
                ->get();
        return $result;
    }
}