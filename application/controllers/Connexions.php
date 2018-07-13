<?php

class Connexions extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$this->load->view('admin/admin_page');
        $this->form_validation->set_rules('login', 'le login de connexion', 'required|trim');
        $this->form_validation->set_rules('motpasse', 'le mot de passe ', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('connexion');
        } else {
            $utilisateur = new Utilisateur();
            
            if(Utilisateur::connexionUser($this->input->post('login'), $this->input->post('motpasse'))){
                $u = Utilisateur::find(Utilisateur::getUtilisateur($this->input->post('login'), $this->input->post('motpasse'))[0]->id);
                //var_dump($u->nom);
                $this->session->set_userdata('utilisateur', serialize($u));
                header('Location: '.base_url().'compte/accueil');
            }else{
                 $data = array('erreur' => 'Oups, impossible de vous connectez. Veuillez vérifié le login et le mot de passe.');
                 $this->load->view('connexion', $data);
            }
            
        }
    }

}
