<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class TypeEtat extends Eloquent
{
    public $table = "typeetat";
    
    public function etat() {
        return $this->hasMany('Etat', 'typeetat');
    }
    
}