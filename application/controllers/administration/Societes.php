<?php

class Societes extends CI_Controller {

    protected $societe;
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
        $data = array('liste' => Societe::where('visibilite','=','1')->get());
        $this->load->view('administration/societe/liste',$data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function ajouter(){
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/societe/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Societe::create($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/societes');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/societe/ajouter', $msg);
            }
        }
        
         // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier(){
        $society = $_GET['id'];
        $s = Societe::find($society);
        
        $this->verifieChamp();
         $data = array('societe'=>$s);
         
        if ($this->form_validation->run() == FALSE) {
           
                $this->load->view('administration/societe/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $s = Societe::where('id', '=', $society)->update($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/societes');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $s,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/societe/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function detail() {
        $society = $_GET['id'];
        $s = Societe::find($society);
        $data = array('societe' => $s);
        $this->load->view('administration/societe/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $society = $_GET['id'];
        $u = Societe::find($society);

        $data = array('societe' => $u);

        $this->load->view('administration/societe/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $society = $_GET['id'];
        $u = Societe::find($society);

        $data = array('societe' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer la societe utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('societe' => $u, 'erreur' => ' Erreur : Impossible de supprimer une société en cours d\'utilisation...');
            $this->load->view('administration/societe/supprimer', $msg);
        } else {
            try {
                $u = Societe::where('id', '=', $society)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/societes');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/societe/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('nom', 'le nom', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('libelle', 'le libelle', 'required|trim|min_length[4]|max_length[30]');
//        $this->form_validation->set_rules('description', 'la description', 'required|trim|min_length[8]|max_length[254]');
        $this->form_validation->set_rules('logo', 'le logo', 'required|trim|min_length[1]|max_length[254]');
        $this->form_validation->set_rules('slogan', 'le slogan', 'required|trim|min_length[9]|max_length[100]');
        $this->form_validation->set_rules('siteweb', 'le site web', 'required|trim|min_length[9]|max_length[100]|valid_url');
        $this->form_validation->set_rules('contact', 'le contact', 'required|trim|min_length[9]|max_length[9]|is_natural');
        $this->form_validation->set_rules('boitepostal', 'la boite postal', 'required|trim|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('email', 'L\'adresse email', 'required|trim|valid_email');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'nom' => $this->input->post('nom'),
            'libelle' => $this->input->post('libelle'),
            'description' => $this->input->post('description'),
            'logo' => $this->input->post('logo'),
            'slogan' => $this->input->post('slogan'),
            'siteweb' => $this->input->post('siteweb'),
            'contact' => $this->input->post('contact'),
            'boitepostal' => $this->input->post('boitepostal'),
            'email' => $this->input->post('email')
        );
        return $valeurs;
    }
    
}
