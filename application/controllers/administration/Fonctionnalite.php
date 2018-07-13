<?php

class Fonctionnalite extends CI_Controller {

    protected $utilisateur;
    protected $pages;

    public function __construct() {
        parent::__construct();
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->pages = Page::where('visibilite','=', '1')->get();

        if (isset($this->utilisateur)) {
            if ($this->utilisateur->typeutilisateur != 2)
                header('Location: ' . base_url() . 'controle47');
        }else {
            header('Location: ' . base_url() . 'controle47');
        }

        $data = array('utilisateur' => $this->utilisateur->nom . ' ' . $this->utilisateur->prenom,
            'type' => $this->utilisateur->getTypeUtilisateur->libelle);
        $this->load->view('header_administration', $data);
    }
    
    public function liste_page(){
        $data = array('liste' => $this->pages);
        $this->load->view('administration/fonctionnalite/liste_page', $data);
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function ajouter_page(){
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/fonctionnalite/ajouter_page');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Page::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/fonctionnalite/liste_page');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fonctionnalite/ajouter_page', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier_page() {
        $p = $_GET['id'];
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $data = array('page' => Page::find($p));
            $this->load->view('administration/fonctionnalite/modifier_page', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Page::where('id', '=', $p)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/fonctionnalite/liste_page');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('page' => Page::find($p), 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fonctionnalite/modifier_page', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function supprimer_page() {
        $p = $_GET['id'];
        $this->verifieChamp();
        $data = array('page' => Page::find($p));
        $this->load->view('administration/fonctionnalite/supprimer_page', $data);
    }
    
    public function valid_sup_page() {
        $u = $_GET['id'];
        $page = Page::find($u);
        try {
            $val = array('visibilite' => 0);
            $page = Page::where('id', '=', $u)->update($val);
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/fonctionnalite/liste_page');
        } catch (Illuminate\Database\QueryException $exc) {
            $this->session->set_userdata('erreur',' Erreur de données !' . $exc->errorInfo[2]);
            header('Location: ' . base_url() . 'administration/fonctionnalitecription/liste_page');
        }
    }
    
    //////////////// options ////////////////////////////
    private function verifieChamp() {
        $this->form_validation->set_rules('libelle', 'le libelle', 'required|trim|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('description', 'le description ', 'required|trim|min_length[4]|max_length[50]');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'libelle' => $this->input->post('libelle'),
            'description' => $this->input->post('description')
        );
        return $valeurs;
    }
    
}