<?php

class Circonscription extends CI_Controller {

    protected $utilisateur;

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

        $data = array('utilisateur' => $this->utilisateur->nom . ' ' . $this->utilisateur->prenom,
            'type' => $this->utilisateur->getTypeUtilisateur->libelle);
        $this->load->view('header_administration', $data);
    }

    public function lister() {
        $data = array('liste' => Region::all());
        $this->load->view('administration/circons/liste_region', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter_region() {
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/ajouter_region');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Region::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/lister');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/ajouter_region', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier_region() {
        $user = $_GET['id'];
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $data = array('region' => Region::find($user));
            $this->load->view('administration/circons/modifier_region', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Region::where('id', '=', $user)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/lister');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('region' => Region::find($user), 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/modifier_region', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer_region() {
        $user = $_GET['id'];
        $this->verifieChamp();
        $data = array('region' => Region::find($user));
        $this->load->view('administration/circons/supprimer_region', $data);
    }

    public function valid_sup_region() {
        $u = $_GET['id'];
        $region = Region::find($u);
        try {
            $region->delete();
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/circonscription/lister');
        } catch (Illuminate\Database\QueryException $exc) {
            $this->session->set_userdata('erreur',' Erreur de données !' . $exc->errorInfo[2]);
            header('Location: ' . base_url() . 'administration/circonscription/lister');
        }
    }
    
    public function listede(){
        $data = array('liste' => Departement::all());
        $this->load->view('administration/circons/liste_depart', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter_depart(){
        $this->verifieChampDepart();
        $data = array('liste' => Region::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/ajouter_depart', $data);
        } else {
            $val = $this->valeurFormulaireDepart();
            try {
                $u = Departement::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/listede');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('liste' => Region::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/ajouter_depart', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier_depart(){
        $id = $_GET['id'];
        
        $this->verifieChampDepart();
        $data = array('departement' => Departement::find($id),'liste' => Region::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/modifier_depart', $data);
        } else {
            $val = $this->valeurFormulaireDepart();
            try {
                $u = Departement::find($id)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/listede');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('departement' => Departement::find($id),'liste' => Region::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/modifier_depart', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function supprimer_depart(){
        $id = $_GET['id'];
        $data = array('departement' => Departement::find($id),'liste' => Region::all());
        $this->load->view('administration/circons/supprimer_depart', $data);
    }
    
    public function valid_sup_depart() {
        $id = $_GET['id'];
        $departement = Departement::find($id);
        try {
            $departement->delete();
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/circonscription/listede');
        } catch (Illuminate\Database\QueryException $exc) {
            $this->session->set_userdata('erreur',' Erreur de données !' . $exc->errorInfo[2]);
            header('Location: ' . base_url() . 'administration/circonscription/listede');
        }
    }
    ///////////////// les communes ///////////////
    public function listecomm(){
        $data = array('liste' => Commune::all());
        $this->load->view('administration/circons/listecomm', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter_commune(){
        $this->verifieChampCommune();
        $data = array('liste' => Departement::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/ajouter_commune', $data);
        } else {
            $val = $this->valeurFormulaireCommune();
            try {
                $u = Commune::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/listecomm');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('liste' => Departement::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/ajouter_commune', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier_commune(){
        $id = $_GET['id'];
        
        $this->verifieChampCommune();
        $data = array('commune' => Commune::find($id),'liste' => Departement::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/modifier_commune', $data);
        } else {
            $val = $this->valeurFormulaireCommune();
            try {
                $u = Commune::find($id)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/listecomm');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('commune' => Commune::find($id),'liste' => Departement::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/modifier_commune', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function supprimer_commune(){
        $id = $_GET['id'];
        $data = array('commune' => Commune::find($id),'liste' => Departement::all());
        $this->load->view('administration/circons/supprimer_commune', $data);
    }
    
    public function valid_sup_commune() {
        $id = $_GET['id'];
        $commune = Commune::find($id);
        try {
            $commune->delete();
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/circonscription/listecomm');
        } catch (Illuminate\Database\QueryException $exc) {
            $this->session->set_userdata('erreur',' Erreur de données !' . $exc->errorInfo[2]);
            header('Location: ' . base_url() . 'administration/circonscription/listecomm');
        }
    }
    ///////////////// les communes ///////////////
    public function liste_quartier(){
        $data = array('liste' => Quartier::where('visibilite','=','1')->get());
        $this->load->view('administration/circons/liste_quartier', $data);
        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter_quartier(){
        $this->verifieChampQuartier();
        $data = array('liste' => Commune::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/ajouter_quartier', $data);
        } else {
            $val = $this->valeurFormulaireQuartier();
            try {
                $u = Quartier::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/liste_quartier');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('liste' => Commune::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/ajouter_quartier', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier_quartier(){
        $id = $_GET['id'];
        
        $this->verifieChampQuartier();
        $data = array('quartier' => Quartier::find($id),'liste' => Commune::all());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/circons/modifier_quartier', $data);
        } else {
            $val = $this->valeurFormulaireQuartier();
            try {
                $u = Quartier::find($id)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/circonscription/liste_quartier');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('quartier' => Quartier::find($id),'liste' => Commune::all(),'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/circons/modifier_quartier', $msg);
            }
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function supprimer_quartier(){
        $id = $_GET['id'];
        $data = array('quartier' => Quartier::find($id),'liste' => Commune::all());
        $this->load->view('administration/circons/supprimer_quartier', $data);
    }
    
    public function valid_sup_quartier() {
        $id = $_GET['id'];
        $quartier = Quartier::find($id);
        try {
            $quartier->delete();
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/circonscription/liste_quartier');
        } catch (Illuminate\Database\QueryException $exc) {
            $this->session->set_userdata('erreur',' Erreur de données !' . $exc->errorInfo[2]);
            header('Location: ' . base_url() . 'administration/circonscription/liste_quartier');
        }
    }
///////////////// options ////////////////////////////
    private function verifieChamp() {
        $this->form_validation->set_rules('code', 'le code', 'required|trim|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('libelle', 'le llibelle ', 'required|trim|min_length[4]|max_length[50]');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'code' => $this->input->post('code'),
            'libelle' => $this->input->post('libelle')
        );
        return $valeurs;
    }
//////////////// departement ///////////
    private function verifieChampDepart() {
        $this->form_validation->set_rules('code', 'le code', 'required|trim|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('libelle', 'le llibelle ', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('region', 'la région  ', 'required|trim');
    }

    private function valeurFormulaireDepart() {
        $valeurs = array(
            'code' => $this->input->post('code'),
            'libelle' => $this->input->post('libelle'),
            'region' => $this->input->post('region')
        );
        return $valeurs;
    }
//////////////// commune  ///////////
    private function verifieChampCommune() {
        $this->form_validation->set_rules('code', 'le code', 'required|trim|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('libelle', 'le llibelle ', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('departement', 'le département  ', 'required|trim');
    }

    private function valeurFormulaireCommune() {
        $valeurs = array(
            'code' => $this->input->post('code'),
            'libelle' => $this->input->post('libelle'),
            'departement' => $this->input->post('departement')
        );
        return $valeurs;
    }
//////////////// quartier  ///////////
    private function verifieChampQuartier() {
        $this->form_validation->set_rules('nom', 'le nom', 'required|trim|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('description', 'le description ', 'required|trim|min_length[4]|max_length[250]');
        $this->form_validation->set_rules('commune', 'la commune  ', 'required|trim');
    }

    private function valeurFormulaireQuartier() {
        $valeurs = array(
            'nom' => $this->input->post('nom'),
            'description' => $this->input->post('description'),
            'commune' => $this->input->post('commune')
        );
        return $valeurs;
    }

}
