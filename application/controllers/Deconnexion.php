<?php

class Deconnexion extends CI_Controller {

    public function index() {
        if($this->session->userdata('utilisateur') == NULL){
            header('Location: ' . base_url() . 'controle47');
        }
        
        $u = unserialize($this->session->userdata('utilisateur'));
        
        if ($u->typeutilisateur == 2) {
            $this->session->unset_userdata('utilisateur');
            header('Location: ' . base_url() . 'controle47');
        }
        if ($u->typeutilisateur == 3) {
            $this->session->unset_userdata('utilisateur');
            header('Location: ' . base_url() . 'welcome');
        }
        if ($u->typeutilisateur == 4) {
            $this->session->unset_userdata('utilisateur');
            header('Location: ' . base_url() . 'welcome');
        }
    }

}
