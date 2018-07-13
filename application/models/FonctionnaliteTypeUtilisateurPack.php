<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('Eloquent.php');
use Illuminate\Database\Eloquent\Model as Eloquent;
class FonctionnaliteTypeUtilisateurPack extends Eloquent
{
    public $table = "fonctionnalite_typeutilisateur_pack";
}