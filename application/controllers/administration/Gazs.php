<?php

class Gazs extends CI_Controller {

    protected $utilisateur;
    protected $gaz;

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
        $data = array('liste' => Gaz::all());
        $this->load->view('administration/gaz/liste', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();

        //Passage des donnees de la table format du produit
        $data['formatproduits'] = $this->Select_model->getAllFormatProduit();

        //Passage des donnees de la table produit
        $data['produits'] = $this->Select_model->getAllProduit();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/gaz/ajouter', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Gaz::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/gazs');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/gaz/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

   
    public function modifier() {
        $gazeux = $_GET['id'];
        $u = Gaz::find($gazeux);

        $this->verifieChamp();
        $data = array('gaz' => $u);
        
        //Passage des donnees de la table produit
        $data['produits'] = $this->Select_model->getAllProduit();
        
        //Passage des donnees de la table formatproduit
        $data['formatproduits'] = $this->Select_model->getAllFormatProduit();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('administration/gaz/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Gaz::where('id', '=', $gazeux)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/gazs');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('gaz' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/gaz/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function detail() {
        $gazeux = $_GET['id'];
        $s = Gaz::find($gazeux);
        $data = array('gaz' => $s);
        $this->load->view('administration/gaz/consulter', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {
        $gazeux = $_GET['id'];
        $u = Gaz::find($gazeux);

        $data = array('gaz' => $u);

        $this->load->view('administration/gaz/supprimer', $data);

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valider_suppression() {
        $gazeux = $_GET['id'];
        $u = Gaz::find($gazeux);

        $data = array('gaz' => $u);
        
        /// impossible de supprimer le gaz utilise
        if ($u->id == $this->utilisateur->id) {
            $msg = array('gaz' => $u, 'erreur' => ' Erreur : Impossible de supprimer un gaz en cours d\'utilisation...');
            $this->load->view('administration/gaz/supprimer', $msg);
        } else {
            try {
                //Suppression direct du gaz
                $u = Gaz::destroy($gazeux);
                
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/gazs');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('societe' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/gaz/supprimer', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('produit', 'Le produit', 'required');
        $this->form_validation->set_rules('formatproduit', 'Le format du produit', 'required');
        $this->form_validation->set_rules('prix_unitaire', 'Le prix unitaire', 'required|trim|min_length[4]|max_length[30]|numeric');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'produit' => $this->input->post('produit'),
            'formatproduit' => $this->input->post('formatproduit'),
            'prix_unitaire' => $this->input->post('prix_unitaire')
        );
        return $valeurs;
    }

}
