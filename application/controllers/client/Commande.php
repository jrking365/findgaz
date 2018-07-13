<?php

class Commande extends CI_Controller {
    
    private  $utilisateur;
    
    public function __construct() {
        parent::__construct();
        $connecte = FALSE;
        if ($this->session->userdata('utilisateur') != NULL) {
            $this->utilisateur = unserialize($this->session->userdata('utilisateur'));
            if ($this->utilisateur->typeutilisateur == 1) {
                
                $connecte = TRUE;
            } else {
                header('Location: '.base_url().'client/deconnexion');
            }
        }
        $data = array('utilisateur' => $this->utilisateur, 'is_connect' => $connecte);
        $this->load->view('header_welcome', $data);
    }

    public function index() {
        $this->load->view('client/effectuer_commande');
        $this->load->view('footer_welcome');
        $this->load->view('client/script_stepper');
    }

}
