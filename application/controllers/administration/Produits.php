<?php

class Produits extends CI_Controller {

    protected $utilisateur;
    protected $produit;

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
        $data = array('liste' => Produit::where('visibilite', '=', '1')->get());
        $this->load->view('administration/produit/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();
        //Passage des donnees de la table societe
        $data['societes'] = $this->Select_model->getAllSociete();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/produit/ajouter', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Produit::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/produits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/produit/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {
        $product = $_GET['id'];
        $u = Produit::find($product);

        $this->verifieChamp();
        $data = array('produit' => $u);
        //Passage des donnees de la table societe
        $data['societes'] = $this->Select_model->getAllSociete();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/produit/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Produit::where('id', '=', $product)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/produits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('produit' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/produit/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $product = $_GET['id'];
        $s = Produit::find($product);
        $data = array('produit' => $s);
        $this->load->view('administration/produit/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $product = $_GET['id'];
        $u = Produit::find($product);

        $data = array('produit' => $u);

        $this->load->view('administration/produit/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $product = $_GET['id'];
        $u = Produit::find($product);

        $data = array('produit' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer la societe utilisee 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('produit' => $u, 'erreur' => ' Erreur : Impossible de supprimer une société en cours d\'utilisation...');
            $this->load->view('administration/produit/supprimer', $msg);
        } else {
            try {
                $u = Produit::where('id', '=', $product)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/produits');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/produit/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    private function verifieChamp() {
        $this->form_validation->set_rules('societe', 'La societe', 'required');
        $this->form_validation->set_rules('libelle', 'le libelle du produit', 'required|trim|min_length[4]|max_length[30]');
//        $this->form_validation->set_rules('description', 'la description du produit', 'required|trim|min_length[4]|max_length[254]');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'societe' => $this->input->post('societe'),
            'libelle' => $this->input->post('libelle'),
            'description' => $this->input->post('description')
        );
        return $valeurs;
    }

    private function generateCodeOfProduit($societe, $libelle, $lastId) {
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
