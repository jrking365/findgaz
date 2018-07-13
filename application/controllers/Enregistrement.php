<?php

class Enregistrement extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$this->load->view('admin/admin_page');
        /* $this->form_validation->set_rules('login', 'le login de connexion', 'required|trim');
          $this->form_validation->set_rules('motpasse', 'le mot de passe ', 'required|trim');
          if ($this->form_validation->run() == FALSE) {
          $this->load->view('connexion_page');
          } else {
          $utilisateur = new Utilisateur();

          if(Utilisateur::connexionUser($this->input->post('login'), $this->input->post('motpasse'))){
          $u = Utilisateur::find(Utilisateur::getUtilisateur($this->input->post('login'), $this->input->post('motpasse'))[0]->id);
          //var_dump($u->nom);
          $this->session->set_userdata('utilisateur', serialize($u));
          header('Location: '.base_url().'administration/accueil');
          }else{
          $data = array('erreur' => 'Oups, impossible de se connecter. Veuillez vérifié le login et le mot de passe.');
          $this->load->view('connexion_page', $data);
          }

          } */
        $this->load->view('enregistrement/page1');
    }

    public function creeObjet() {
        /*
         *  petite documentation sur la fonction et les retour de valeurs : 
         *  ----  Erreur -------
         *  0 => erreur de typeUtilisateur 
         * ------ Succes ------------
         *  1 => objet crée avec succes et sauvegardé en mémoire pour l'ajout de la localisation
         * 
         */

        $objet = $_POST['objet'];
        
        $o = json_decode($objet, TRUE);
        $user = new Utilisateur($o);
        
        $ancien = Utilisateur::where('email', '=', $o['email'])
                        ->where('contact', '=', $o['contact'])
                        ->where('numerocni', '=', $o['numerocni'])
                        ->where('login', '=', $o['login'])->get();

        /// pour vérifier qu'un utilisateur ne posséde pas les données 
        $liste_erreur = " Un utilisateur ayant : ";
        $if_erreur = FALSE;
        
        if (sizeof(Utilisateur::where('login', '=', $user->login)->get()) != 0){
            $liste_erreur.= ' login  '.$user->login.' , ';
            $if_erreur = TRUE;
        }
        if (sizeof(Utilisateur::where('contact', '=', $user->contact)->get()) != 0 ) {
            $liste_erreur.= ' contact  '.$user->contact.'  ';
            $if_erreur = TRUE;
        }
        if (sizeof(Utilisateur::where('numerocni', '=', $user->numerocni)->get()) != 0) {
            $liste_erreur.= ' numero cni   '.$user->numerocni.'  ';
            $if_erreur = TRUE;
        }
        if (sizeof(Utilisateur::where('email', '=', $user->email)->get()) != 0) {
            $liste_erreur.= ' adresse email   '.$user->email.'  ';
            $if_erreur = TRUE;
        }
        $liste_erreur .= " existe déja, vérifier vos données s'il vous plait ! ";

        if ($if_erreur) { // dans ce cas la fonction doit nous affiché une page d'erreur 
            echo $liste_erreur;
        } else {
            /// utilisateur non existant et possible d'être crée 
            if ($user->typeutilisateur != NULL) {
                $user->pack = 1;
                if ($user->typeutilisateur == 1) {
                    $user->etat = 1;
                } else {
                    $user->etat = 2;
                }
                $this->session->set_userdata('new_user', serialize($user));
                echo 1;
            } else {
                echo 0;
            }
        }


        //echo json_decode($objet);
    }
    
    public function cartePosition(){
        $data = array('quartiers' => Quartier::all());
        $this->load->view('enregistrement/carteposition', $data);
    }
    
    public function ajoutPosition(){
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $user = unserialize($this->session->userdata('new_user'));
            $user->latitude = $latitude;
            $user->longitude = $longitude;
        $this->session->unset_userdata('new_user');
        
        try {
            $user->save();
            echo 1;
        } catch (Illuminate\Database\QueryException $exc) {
            echo 0;
        }
    }
}
