<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class NotationUtilisateur extends Eloquent
{
    public $table = "notationutilisateur";
    
    public function elementNotation() {
        return $this->belongsTo('ElementNotation', 'elementnotation');
    }
    
}