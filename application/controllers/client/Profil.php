<?php


class Profil extends CI_Controller {
    
    private  $utilisateur;
    
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
        $data = array('utilisateur' => $this->utilisateur, 'is_connect' => $connecte);
        $this->load->view('header_welcome', $data);
    }
    
    public function index(){
        $data = array('utilisateur' => $this->utilisateur);
                
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('client/profil', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                Utilisateur::where('id', '=', $this->utilisateur->id)->update($val);
                $msg = array('utilisateur' => $this->utilisateur, 'succes' => ' Modification éffectué avec succes !');
                $this->load->view('client/profil', $msg);
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur' => $this->utilisateur, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('client/profil', $msg);
            }
        }
        
        $this->load->view('footer_welcome');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('nom', 'le nom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('prenom', 'le prenom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('contact', 'le contact', 'required|trim|min_length[9]|max_length[9]|numeric');
        $this->form_validation->set_rules('email', 'adresse mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('numerocni', 'le numéro de CNI ', 'required|trim|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('genre', 'le genre', 'required|trim');
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
            'statutmatrimonial' => $this->input->post('statutmatrimonial')
        );
        return $valeurs;
    }
}