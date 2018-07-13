<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class ElementNotation extends Eloquent
{
    public $table = "elementnotation";
    
    public function notationUtilisateur() {
        return $this->hasMany('NotationUtilisateur', 'elementnotation');
    }
    
}