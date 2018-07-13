<?php

class Formatproduits extends CI_Controller {

    protected $formatproduits;
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
        $data = array('liste' => FormatProduit::where('visibilite','=','1')->get());
        $this->load->view('administration/formatproduit/liste',$data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function ajouter(){
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/formatproduit/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = FormatProduit::create($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/formatproduits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/formatproduit/ajouter', $msg);
            }
        }
        
         // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier(){
        $format = $_GET['id'];
        $s = FormatProduit::find($format);
        
        $this->verifieChamp();
         $data = array('formatproduit'=>$s);
         
        if ($this->form_validation->run() == FALSE) {
           
                $this->load->view('administration/formatproduit/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $s = FormatProduit::where('id', '=', $format)->update($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/formatproduits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('formatproduit' => $s,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/formatproduit/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function detail() {
        $format = $_GET['id'];
        $s = FormatProduit::find($format);
        $data = array('formatproduit' => $s);
        $this->load->view('administration/formatproduit/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $format = $_GET['id'];
        $u = FormatProduit::find($format);

        $data = array('formatproduit' => $u);

        $this->load->view('administration/formatproduit/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $format = $_GET['id'];
        $u = FormatProduit::find($format);

        $data = array('formatproduit' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer la formatproduit utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('formatproduit' => $u, 'erreur' => ' Erreur : Impossible de supprimer une société en cours d\'utilisation...');
            $this->load->view('administration/formatproduit/supprimer', $msg);
        } else {
            try {
                $u = FormatProduit::where('id', '=', $format)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/formatproduits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('formatproduit' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/formatproduit/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('code', 'le code', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('masse', 'la masse', 'required|trim|min_length[1]|max_length[9]|is_natural');
        $this->form_validation->set_rules('unite', 'l\'unite', 'required|trim|min_length[1]|max_length[30]');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'code' => $this->input->post('code'),
            'masse' => $this->input->post('masse'),
            'unite' => $this->input->post('unite')
        );
        return $valeurs;
    }
    
}
