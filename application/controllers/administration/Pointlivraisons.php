<?php

class Pointlivraisons extends CI_Controller {

    protected $utilisateur;
    protected $listePoints;
    protected $quartiers;

    public function __construct() {
        parent::__construct();
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));

        $this->listePoints = PointLivraison::where('visibilite', '=', '1')->get();
        $this->quartiers = Quartier::where('visibilite', '=', '1')->get();

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

        $this->load->view('administration/pointlivraison/liste', array('liste' => $this->listePoints));

        // le footer 
        $this->load->view('footer_administration');
    }

    public function ajouter() {

        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/pointlivraison/ajouter', array('liste' => $this->quartiers));
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = PointLivraison::create($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/pointlivraisons');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('liste' => $this->quartiers, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/pointlivraisons/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function modifier() {

        $id = $_GET['id'];
        $point = PointLivraison::find($id);

        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/pointlivraison/modifier', array('liste' => $this->quartiers, 'point' => $point));
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = PointLivraison::find($id)->update($val);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/pointlivraisons');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('liste' => $this->quartiers, 'point' => $point, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/pointlivraisons/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }

    public function supprimer() {

        $id = $_GET['id'];
        $point = PointLivraison::find($id);

        $this->load->view('administration/pointlivraison/supprimer', array('point' => $point));

        // le footer 
        $this->load->view('footer_administration');
    }

    public function valid_sup_point() {
        $id = $_GET['id'];
        $point = PointLivraison::find($id);
        try {
            //$u = PointLivraison::where('id', '=', $point->id)->update(array('visibilite'=>0));
            $point->visibilite = 0;
            $point->save();
            $this->session->set_userdata('succes', '1');
            header('Location: ' . base_url() . 'administration/pointlivraisons');
        } catch (Illuminate\Database\QueryException $exc) {
            $msg = array('point' => $point, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
            $this->load->view('administration/pointlivraisons/supprimer', $msg);
        }
    }
    
    public function carte(){
        $this->load->view('administration/pointlivraison/carte', array('points' => $this->listePoints));

        // le footer 
        $this->load->view('footer_administration');
    }

    private function valeurFormulaire() {
        $valeurs = array(
            'quartier' => $this->input->post('quartier'),
            'libelle' => $this->input->post('libelle'),
            'description' => $this->input->post('description'),
            'longitude' => $this->input->post('longitude'),
            'latitude' => '' . $this->input->post('latitude')
        );
        return $valeurs;
    }

    private function verifieChamp() {
        $this->form_validation->set_rules('quartier', 'le quartier où se trouve le point', 'required|trim');
        $this->form_validation->set_rules('libelle', 'le libelle du point ', 'required|trim|min_length[2]|max_length[40]');
        $this->form_validation->set_rules('description', 'le description sur le point ', 'required|trim|min_length[4]|max_length[255]');
        $this->form_validation->set_rules('latitude', 'la latitude du point', 'required|trim|numeric');
        $this->form_validation->set_rules('longitude', 'la longitude du point', 'required|trim');
    }
    
    
}
