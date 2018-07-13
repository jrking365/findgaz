<?php

class Packlivraisons extends CI_Controller {

    protected $utilisateur;
    protected $packlivraison;

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
        $data = array('liste' => PackLivraison::where('visibilite', '=', '1')->get());
        $this->load->view('administration/packlivraison/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/packlivraison/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = PackLivraison::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/packlivraisons');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/packlivraison/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {
        $packli = $_GET['id'];
        $u = PackLivraison::find($packli);

        $this->verifieChamp();
        $data = array('packlivraison' => $u);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/packlivraison/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = PackLivraison::where('id', '=', $packli)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/packlivraisons');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('packlivraison' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/packlivraison/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $packli = $_GET['id'];
        $s = PackLivraison::find($packli);
        $data = array('packlivraison' => $s);
        $this->load->view('administration/packlivraison/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $packli = $_GET['id'];
        $u = PackLivraison::find($packli);

        $data = array('packlivraison' => $u);

        $this->load->view('administration/packlivraison/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $packli = $_GET['id'];
        $u = PackLivraison::find($packli);

        $data = array('packlivraison' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer le pack de livraison utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('packlivraison' => $u, 'erreur' => ' Erreur : Impossible de supprimer un pack de livraison en cours d\'utilisation...');
            $this->load->view('administration/packlivraison/supprimer', $msg);
        } else {
            try {
                $u = PackLivraison::where('id', '=', $packli)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/packlivraisons');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/packlivraison/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('libelle', 'le libelle du pack de livraison', 'required|trim|min_length[4]|max_length[30]');
//        $this->form_validation->set_rules('description', 'la description du packlivraison', 'required|trim|min_length[4]|max_length[254]');
        $this->form_validation->set_rules('prix_packlivraison', 'Le prix du pack de livraison', 'required|trim|min_length[4]|max_length[30]|numeric');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'libelle' => $this->input->post('libelle'),
            'description' => $this->input->post('description'),
            'prix_packlivraison' => $this->input->post('prix_packlivraison')
        );
        return $valeurs;
    }

    private function generateCodeOfPackLivraison($libelle, $lastId) {
        $code = substr($societe, 0, 3);
        $code .= "-" . date("YYYY");
        $code .= "." . substr($libelle, 0, 3);
        $code .= "~" . getLastid() . "@TS";
        return $code;
    }

    public function getLastId($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->result();
        $lastId = $result[0]->id;
        return $lastId;
    }

}
