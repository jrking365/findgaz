<?php

class Visiteurs extends CI_Controller {

    protected $visiteurs;
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

        $data = array('utilisateur' => $this->utilisateur->code . ' ' . $this->utilisateur->precode,
            'type' => $this->utilisateur->getTypeUtilisateur->unite);
        $this->load->view('header_administration', $data);
    }

    public function index() {
        $data = array('liste' => Visiteur::all());
        $this->load->view('administration/visiteur/liste',$data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function ajouter(){
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/visiteur/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            var_dump($val);
            try {
                $u = Visiteur::create($val);
                /*$this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/visiteurs');*/
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/visiteur/ajouter', $msg);
            }
        }
         // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier(){
        $visit = $_GET['id'];
        $s = Visiteur::find($visit);
        
        $this->verifieChamp();
         $data = array('visiteur'=>$s);
         
        if ($this->form_validation->run() == FALSE) {
           
                $this->load->view('administration/visiteur/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $s = Visiteur::where('id', '=', $visit)->update($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/visiteurs');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('visiteur' => $s,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/visiteur/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function detail() {
        $visit = $_GET['id'];
        $s = Visiteur::find($visit);
        $data = array('visiteur' => $s);
        $this->load->view('administration/visiteur/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $visit = $_GET['id'];
        $u = Visiteur::find($visit);

        $data = array('visiteur' => $u);

        $this->load->view('administration/visiteur/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $visit = $_GET['id'];
        $u = Visiteur::find($visit);

        $data = array('visiteur' => $u);

        /// impossible de supprimer la visiteur utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('visiteur' => $u, 'erreur' => ' Erreur : Impossible de supprimer un visiteur en cours d\'utilisation...');
            $this->load->view('administration/visiteur/supprimer', $msg);
        } else {
            try {
                //Suppression direct du visiteur
                $u = Visiteur::destroy($visit);
                
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/visiteurs');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('visiteur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/visiteur/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('adressemac', 'L\'adresse MAC', 'required|trim|min_length[10]|max_length[20]');
//        $this->form_validation->set_rules('message', 'le message', 'required|trim|min_length[8]|max_length[254]')
        //$this->form_validation->set_rules('email', 'L\'adresse email', 'required|trim|valid_email');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'adressemac' => $this->input->post('adressemac'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message')
        );
        return $valeurs;
    }
    
}