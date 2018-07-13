<?php

class Accueil extends CI_Controller {

    protected $utilisateur;
    protected $data;
    protected $pointvente;
    protected $quartier;
    protected $liste;
    protected $maListe ;

    public function __construct() {
        parent::__construct();
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));

        if (isset($this->utilisateur)) {
            if ($this->utilisateur->typeutilisateur != 3)
                header('Location: ' . base_url() . 'welcome');
        }else {
            header('Location: ' . base_url() . 'welcome');
        }

        $this->pointvente = PointVente::where('visibilite', '=', '1')->where('fournisseur', '=', $this->utilisateur->id)->get();

        if (is_object($this->pointvente) && isset($this->pointvente[0])) {
            $this->pointvente = $this->pointvente[0];
            if ($this->pointvente->etat == 5) {
                $this->liste = Gaz::all();
            }
        }

        //recuperation de tous les quatiers
        $this->quartier = Quartier::all();
        //recuperation des elements du point de vente
        $this->maListe = PointVenteGaz::all() ;

        $this->data = array('utilisateur' => $this->utilisateur, 'true' => 0, 'pointvente' => $this->pointvente, 'liste' => $this->liste, 'maListe' => $this->maListe);
        $this->load->view('utilisateur/header', $this->data);
    }

    public function index() {
        $ud = DemandeUtilisateur::find($this->data['utilisateur']->id);
        if (isset($ud->id)) {
            $this->data['true'] = 1;
        }
        $this->load->view('utilisateur/entete', $this->data);
        $this->load->view('utilisateur/mapage', $this->data);
        $this->load->view('utilisateur/pied', $this->data);
        $this->load->view('footer_administration');
    }

    public function ajouterGaz() {
        $tabGaz = $this->input->post('gaz');
        if ($tabGaz != NULL) {
            for ($i = 0; $i < sizeof($tabGaz); $i++) {
                try {
                    $gaz = Gaz::find($tabGaz[$i]);
                    $var = array('pointvente' => $this->pointvente->id, 'etat' => 9, 'gaz' => $gaz->id, 'visibilite' => '1');
                    $pointVenteGaz = PointVenteGaz::create($var);
                    $this->session->set_userdata('successAjoutGaz', '1');
                    header('Location: ' . base_url() . 'compte/accueil');
                } catch (Illuminate\Database\QueryException $exc) {
                    $this->session->set_userdata('echecAjoutGaz', '1');
                    header('Location: ' . base_url() . 'compte/accueil');
                }
            }
            
        } else {
            $this->session->set_userdata('echecGaz', '1');
            header('Location: ' . base_url() . 'compte/accueil');
        }
    }
    
    public function disponiblite() {
   
        if(isset($_GET['oui'])){
            $oui = $_GET['oui'] ;
        }
        
        if(isset($_GET['non'])){
            $non = $_GET['non'] ;
        }
        
        
    }

    public function ajoutPointVente() {
        $this->verifieChampPointVente();

        $donnees = array('utlisateur' => $this->data['utilisateur'], 'pointvente' => $this->data['pointvente'], 'true' => 0, 'quartier' => $this->quartier, 'msg' => '');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('utilisateur/entete', $donnees);
            $this->load->view('utilisateur/ajoutPointVente', $donnees);
            $this->load->view('utilisateur/pied', $donnees);
        } else {
            $val = $this->valeurFormulairePointVente();
            try {
                $u = PointVente::create($val);
                $this->session->set_userdata('successCreationPointVente', '1');
                header('Location: ' . base_url() . 'compte/accueil');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $donnees['msg'] = $msg;
                $this->load->view('utilisateur/entete', $donnees);
                $this->load->view('utilisateur/ajoutPointVente', $donnees);
                $this->load->view('utilisateur/pied', $donnees);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifierPoint() {

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {

        $ud = DemandeUtilisateur::find($this->data['utilisateur']->id);
        if ((is_object($ud)) && $ud->id == $this->data['utilisateur']->id) {
            $this->session->set_userdata('exitDemande', '1');
            header('Location: ' . base_url() . 'compte/accueil');
        } else {
            $this->verifieChamp();
            $data = array('utilisateur' => $this->utilisateur);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('utilisateur/modifier', $data);
            } else {
                $val = $this->valeurFormulaire();
                try {

                    $u = DemandeUtilisateur::create($val);
                    $u->id = $this->utilisateur->id;
                    $u->save();

                    $this->session->set_userdata('successDemande', '1');
                    header('Location: ' . base_url() . 'compte/accueil');
                } catch (Illuminate\Database\QueryException $exc) {
                    $msg = array('utilisateur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                    $this->load->view('utilisateur/modifier', $msg);
                }
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
        $this->form_validation->set_rules('contact', 'le contact', 'required|trim|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('email', 'adresse mail', 'required|trim');
        $this->form_validation->set_rules('numerocni', 'le numéro de CNI ', 'required|trim|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('genre', 'le genre', 'required|trim');
        $this->form_validation->set_rules('profession', 'la profession', 'required|trim');
        $this->form_validation->set_rules('statutmatrimonial', 'le statut matrimonial', 'required|trim');
    }

    private function verifieChampPointVente() {
        $this->form_validation->set_rules('nom', 'le nom du point de vente', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('description', 'la description de point de vente ', 'required|trim|min_length[20]|max_length[200]');
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
            'etat' => 3,
            'typeutilisateur' => 3
        );
        return $valeurs;
    }

    private function valeurFormulairePointVente() {
        $valeurs = array(
            'quartier' => $this->input->post('quartier'),
            'fournisseur' => $this->data['utilisateur']->id,
            'nom' => $this->input->post('nom'),
            'longitude' => $this->data['utilisateur']->longitude,
            'latitude' => $this->data['utilisateur']->latitude,
            'description' => $this->input->post('description'),
            'etat' => 5,
            'visibilite' => 1
        );
        return $valeurs;
    }

}
