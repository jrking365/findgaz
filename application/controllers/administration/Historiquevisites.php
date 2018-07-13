<?php

    class Historiquevisites extends CI_Controller {

    protected $utilisateur;
    protected $historiquevisite;

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
        $data = array('liste' => Historiquevisite::all());
        $this->load->view('administration/historiquevisite/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();
        
        //Passage des donnees de la table visteur
        $data['visiteurs'] = $this->Select_model->getAllVisiteur();
        
        //Passage des donnees de la table page
        $data['pages'] = $this->Select_model->getAllPage();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/historiquevisite/ajouter', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Historiquevisite::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquevisites');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquevisite/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

   
    public function modifier() {
        $history = $_GET['id'];
            $u = Historiquevisite::find($history);

        $this->verifieChamp();
        $data = array('historiquevisite' => $u);
        
        //Passage des donnees de la table visteur
        $data['visiteurs'] = $this->Select_model->getAllVisteur();
        
        //Passage des donnees de la table page
        $data['pages'] = $this->Select_model->getAllPage();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/historiquevisite/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Historiquevisite::where('id', '=', $history)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquevisites');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('historiquevisite' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquevisite/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $history = $_GET['id'];
        $s = Historiquevisite::find($history);
        $data = array('historiquevisite' => $s);
        $this->load->view('administration/historiquevisite/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $history = $_GET['id'];
        $u = Historiquevisite::find($history);

        $data = array('historiquevisite' => $u);

        $this->load->view('administration/historiquevisite/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $history = $_GET['id'];
        $u = Historiquevisite::find($history);

        $data = array('historiquevisite' => $u);
        
        /// impossible de supprimer le historiquevisite utilise
        if ($u->id == $this->utilisateur->id) {
            $msg = array('historiquevisite' => $u, 'erreur' => ' Erreur : Impossible de supprimer un historiquevisite en cours d\'utilisation...');
            $this->load->view('administration/historiquevisite/supprimer', $msg);
        } else {
            try {
                //Suppression direct du historiquevisite
                $u = Historiquevisite::destroy($history);
                
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/historiquevisites');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/historiquevisite/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('visiteur', 'Le visiteur', 'required');
        $this->form_validation->set_rules('page', 'La page', 'required');
        $this->form_validation->set_rules('datevisite', 'La date de visite', 'required');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'visiteur' => $this->input->post('visiteur'),
            'page' => $this->input->post('page'),
            'datevisite' => $this->input->post('datevisite')
        );
        return $valeurs;
    }

}
