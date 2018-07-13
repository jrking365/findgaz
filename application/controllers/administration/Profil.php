<?php

class Profil extends CI_Controller {

    protected $utilisateur;
    public $listeData;

    public function __construct() {
        parent::__construct();
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));

        if (isset($this->utilisateur)) {
            if ($this->utilisateur->typeutilisateur != 2)
                header('Location: ' . base_url() . 'controle47');
        }else {
            header('Location: ' . base_url() . 'controle47');
        }

        $this->listeData = array('liste' => Utilisateur::where('visibilite', '=', '1')->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'adm')->get()[0]->id)->get());

        $data = array('utilisateur' => $this->utilisateur->nom . ' ' . $this->utilisateur->prenom,
            'type' => $this->utilisateur->getTypeUtilisateur->libelle);
        $this->load->view('header_administration', $data);
    }

    public function index() {
        
        $this->verifieChamp();
        
        if ($this->form_validation->run() == FALSE) {
            $data = array('utilisateur' => $this->utilisateur);
            $this->load->view('administration/profil_admin', $data);
        } else {
            $val = $this->valeurFormulaire2();
            try {
                $u = Utilisateur::where('id', '=', $this->utilisateur->id)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'controle47');
            } catch (Illuminate\Database\QueryException $exc) {
                $data = array('utilisateur' => $this->utilisateur, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/profil_admin', $data);
            }
        }
   
        // le footer 
        $this->load->view('footer_administration');
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('login', 'le login de connexion', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('nom', 'le nom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('prenom', 'le prenom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('contact', 'le contact', 'required|trim|min_length[9]|max_length[9]|numeric');
        $this->form_validation->set_rules('email', 'adresse mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('numerocni', 'le numéro de CNI ', 'required|trim|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('genre', 'le genre', 'required|trim');
        $this->form_validation->set_rules('profession', 'la profession', 'required|trim');
        $this->form_validation->set_rules('statutmatrimonial', 'le statut matrimonial', 'required|trim');
    }
    
    private function valeurFormulaire2() {
        $valeurs = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'numerocni' => '' . $this->input->post('numerocni'),
            'genre' => $this->input->post('genre'),
            'profession' => $this->input->post('profession'),
            'statutmatrimonial' => $this->input->post('statutmatrimonial'),
            'login' => '' . $this->input->post('login')
        );
        return $valeurs;
    }
    
}
