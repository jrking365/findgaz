<?php

class Admin extends CI_Controller {

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

        $this->load->view('administration/admin/liste', $this->listeData);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/admin/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Utilisateur::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/admin');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/admin/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {

        $user = $_GET['id'];
        $u = Utilisateur::find($user);

        $this->verifieChamp2();
        $data = array('utilisateur' => $u);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/admin/modifier', $data);
        } else {
            $val = $this->valeurFormulaire2();
            try {
                $u = Utilisateur::where('id', '=', $user)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/admin');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/admin/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        $data = array('utilisateur' => $u);
        $this->load->view('administration/admin/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);

        $data = array('utilisateur' => $u);

        $this->load->view('administration/admin/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);

        $data = array('utilisateur' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer l'utilisateur connecté 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('utilisateur' => $u, 'erreur' => ' Erreur : Impossible de supprimer un utilisateur en cours ');
            $this->load->view('administration/admin/supprimer', $msg);
        } else {
            try {
                $u = Utilisateur::where('id', '=', $user)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/admin');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/admin/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('login', 'le login de connexion', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('motpasse', 'le mot de passe ', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('nom', 'le nom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('prenom', 'le prenom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('contact', 'le contact', 'required|trim|min_length[9]|max_length[9]|numeric');
        $this->form_validation->set_rules('email', 'adresse mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('numerocni', 'le numéro de CNI ', 'required|trim|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('genre', 'le genre', 'required|trim');
        $this->form_validation->set_rules('profession', 'la profession', 'required|trim');
        $this->form_validation->set_rules('statutmatrimonial', 'le statut matrimonial', 'required|trim');
    }
    
    private function verifieChamp2() {
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

    private function valeurFormulaire() {
        $valeurs = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'numerocni' => '' . $this->input->post('numerocni'),
            'genre' => $this->input->post('genre'),
            'profession' => $this->input->post('profession'),
            'statutmatrimonial' => $this->input->post('statutmatrimonial'),
            'login' => '' . $this->input->post('login'),
            'motpasse' => '' . crypt($this->input->post('motpasse'), 'st'),
            'pack' => 1,
            'etat' => 1,
            'typeutilisateur' => 2
        );
        return $valeurs;
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
