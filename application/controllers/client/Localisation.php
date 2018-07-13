<?php

class Localisation extends CI_Controller {
    
    private  $utilisateur;
    private  $quartiers ;
    private  $societes;
    private  $formatproduit;
    
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
        $this->quartiers = Quartier::all();
        $this->societes = Societe::where('visibilite','=',1)->get();
        $this->formatproduit = FormatProduit::all();
        $data = array('utilisateur' => $this->utilisateur, 'is_connect' => $connecte);
        $this->load->view('header_welcome', $data);
    }

    public function index() {
        $data = array('quartiers' =>  $this->quartiers, 'societes' => $this->societes, 'formats' => $this->formatproduit);
        $this->load->view('client/carte_gaz', $data);
        $this->load->view('footer_welcome');
        $this->load->view('scriptRange');
    }

}