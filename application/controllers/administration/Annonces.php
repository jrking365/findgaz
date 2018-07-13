<?php

class Annonces extends CI_Controller {

    protected $utilisateur;
    protected $annonce;

    public function __construct() {
        parent::__construct();

        //Chargement du model de "Societe"
        //$this->load->model('Societe');
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
        $data = array('liste' => Annonce::where('visibilite', '=', '1')->get());
        $this->load->view('administration/annonce/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();
        //Passage des donnees de la table societe
        $data['societes'] = $this->Select_model->getAllSociete();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/annonce/ajouter', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Annonce::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/annonces');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/annonce/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {
        $news = $_GET['id'];
        $u = Annonce::find($news);

        $this->verifieChamp();
        $data = array('annonce' => $u);
        //Passage des donnees de la table societe
        $data['societes'] = $this->Select_model->getAllSociete();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/annonce/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Annonce::where('id', '=', $news)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/annonces');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('annonce' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/annonce/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $news = $_GET['id'];
        $s = Annonce::find($news);
        $data = array('annonce' => $s);
        $this->load->view('administration/annonce/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $news = $_GET['id'];
        $u = Annonce::find($news);

        $data = array('annonce' => $u);

        $this->load->view('administration/annonce/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $news = $_GET['id'];
        $u = Annonce::find($news);

        $data = array('annonce' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer la societe utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('annonce' => $u, 'erreur' => ' Erreur : Impossible de supprimer une annonce en cours d\'utilisation...');
            $this->load->view('administration/annonce/supprimer', $msg);
        } else {
            try {
                $u = Annonce::where('id', '=', $news)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/annonces');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/annonce/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('societe', 'La societe', 'required');
        $this->form_validation->set_rules('titre', 'le titre de l\'annonce', 'required|trim');
        $this->form_validation->set_rules('datedebut', 'le date de debut de l\'annonce', 'required|trim');
        $this->form_validation->set_rules('datefin', 'le date de fin de l\'annonce', 'required|trim');
        $this->form_validation->set_rules('description', 'la description du annonce', 'required|trim|min_length[4]|max_length[254]');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'societe' => $this->input->post('societe'),
            'titre' => $this->input->post('titre'),
            'description' => $this->input->post('description'),
            'datedebut' => $this->input->post('datedebut'),
            'datefin' => $this->input->post('datefin')
        );
        return $valeurs;
    }

}
