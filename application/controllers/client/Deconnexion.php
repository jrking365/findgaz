<?php

class Deconnexion extends CI_Controller {

    public function index() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url() . 'welcome');
        } else {
            $u = unserialize($this->session->userdata('utilisateur'));
            $this->session->unset_userdata('utilisateur');
            header('Location: ' . base_url() . 'welcome');
        }
    }

}
