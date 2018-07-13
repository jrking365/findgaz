<?php

    class Historiquenavigations extends CI_Controller {

    protected $utilisateur;
    protected $historiquenavigation;

    public function __construct() {
        parent::__construct();

        //Chargement du model de Select_Model
        $this->load->model('select_model');

        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));

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

    public function index() {
        $data = array('liste' => Historiquenavigation::all());
        $this->load->view('administration/historiquenavigation/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();
        
        //Passage des donnees de la table utilisateur
        $data['utilisateurs'] = $this->Select_model->getAllUtilisateur();
        
        //Passage des donnees de la table page
        $data['pages'] = $this->Select_model->getAllPage();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/historiquenavigation/ajouter', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Historiquenavigation::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquenavigations');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquenavigation/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

   
    public function modifier() {
        $history = $_GET['id'];
            $u = Historiquenavigation::find($history);

        $this->verifieChamp();
        $data = array('historiquenavigation' => $u);
        
        //Passage des donnees de la table utilisateur
        $data['utilisateurs'] = $this->Select_model->getAllUtilisateur();
        
        //Passage des donnees de la table page
        $data['pages'] = $this->Select_model->getAllPage();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/historiquenavigation/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Historiquenavigation::where('id', '=', $history)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquenavigations');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('historiquenavigation' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquenavigation/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $history = $_GET['id'];
        $s = Historiquenavigation::find($history);
        $data = array('historiquenavigation' => $s);
        $this->load->view('administration/historiquenavigation/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $history = $_GET['id'];
        $u = Historiquenavigation::find($history);

        $data = array('historiquenavigation' => $u);

        $this->load->view('administration/historiquenavigation/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $history = $_GET['id'];
        $u = Historiquenavigation::find($history);

        $data = array('historiquenavigation' => $u);
        
        /// impossible de supprimer l'historique de navigation utilisee
        if ($u->id == $this->utilisateur->id) {
            $msg = array('historiquenavigation' => $u, 'erreur' => ' Erreur : Impossible de supprimer une historique de navigation en cours d\'utilisation...');
            $this->load->view('administration/historiquenavigation/supprimer', $msg);
        } else {
            try {
                //Suppression direct du historiquenavigation
                $u = Historiquenavigation::destroy($history);
                
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquenavigations');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquenavigation/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('utilisateur', 'L\'utilisateur', 'required');
        $this->form_validation->set_rules('page', 'La page', 'required');
        $this->form_validation->set_rules('datenavigation', 'La date de navigation', 'required');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'utilisateur' => $this->input->post('utilisateur'),
            'page' => $this->input->post('page'),
            'datenavigation' => $this->input->post('datenavigation')
        );
        return $valeurs;
    }

}
