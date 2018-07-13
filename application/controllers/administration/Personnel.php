<?php

class Personnel extends CI_Controller {

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

    public function index() {
        
        $data = array('liste'=> Utilisateur::where('visibilite', '=', '1')->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'frn')->get()[0]->id)->get()) ;
        $this->load->view('administration/fournisseur/liste' ,$data);
           
        // le footer 
        $this->load->view('footer_administration');
    }
    
    
    public function ajouter() {

        $this->verifieChamp();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/fournisseur/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Utilisateur::create($val);
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/ajouter', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function modifier(){
        
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $this->verifieChamp();
         $data = array('utilisateur'=>$u);
         
        if ($this->form_validation->run() == FALSE) {
           
            $this->load->view('administration/fournisseur/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Utilisateur::where('id', '=', $user)->update($val);
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function detail() {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $this->verifieChamp();
        $data = array('utilisateur'=>$u);
         
        $this->load->view('administration/fournisseur/detail', $data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function confirmer(){
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $this->verifieChamp();
        $data = array('utilisateur'=>$u);
        
        $this->load->view('administration/fournisseur/confirmer', $data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function confirmInscription() {
        
        $data = array('liste'=> Utilisateur::where('visibilite', '=', '1')->where('etat', '=', '2')->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'frn')->get()[0]->id)->get()) ;
        if(isset($data['liste'][0]->nom)){
            $this->load->view('administration/fournisseur/listeDemandeInscription', $data);
        } else {
            $this->session->set_userdata('erreurvalid','1');
            header('Location: '.base_url().'administration/personnel');
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function validerinscript() {
        if(isset($_GET['oui'])) {
            $oui = $_GET['oui'];
            $user = Utilisateur::find($oui) ;
            $user->visibilite = 1 ;
            $user->etat = 1 ;

            try {
                $user->save() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        if(isset($_GET['non'])) {
            $non = $_GET['non'];
            $user = Utilisateur::find($non) ;

            try {
                $user->delete() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        
    
        // le footer 
        $this->load->view('footer_administration');
    }

    public function confirmmodification() {
        $data1 = array('nouveau'=> DemandeUtilisateur::where('visibilite', '=', '1')->where('etat', '=', '3')->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'frn')->get()[0]->id)->get()) ;
        $data['nouveau'] = $data1 ;
        
        
        if(isset($data1['nouveau'][0]->nom)){
            $data2 = array('ancien'=> Utilisateur::where('id', '=', DemandeUtilisateur::first()->utilisateur()->first()->id)->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'frn')->get()[0]->id)->get()) ;
            $data['ancien'] = $data2 ;
        } else {
            $this->session->set_userdata('erreurmodif','1');
            header('Location: '.base_url().'administration/personnel');
        }
        
        $this->load->view('administration/fournisseur/listeDemandeModification', $data);
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function confirmPointVente() {
        $listePointVente = PointVente::where('etat', '=', '5')->where('visibilite', '=', '1')->get() ;
        $listeGaz = PointVenteGaz::all() ;
        $data = array('liste' => $listePointVente, 'maListe' => $listeGaz) ;
        if(is_object($listePointVente) && isset($listePointVente[0]->nom)){
            $this->load->view('administration/fournisseur/listePointVente', $data);
        } else {
            $this->session->set_userdata('erreurPointVente','1');
            header('Location: '.base_url().'administration/personnel');
        }
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function validerpoint() {
        if(isset($_GET['oui'])) {
            $oui = $_GET['oui'];
            $point = PointVente::find($oui) ;
            $point->etat = 8 ;

            try {
                $point->save() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        if(isset($_GET['non'])) {
            $non = $_GET['non'];
            $point->etat = 6 ;

            try {
                $point->save() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function validermodification() {
       if(isset($_GET['oui'])) {
            $oui = $_GET['oui'];
            $nouveau = DemandeUtilisateur::find($oui) ;
            $ancien = Utilisateur::find($oui) ;
            
            //on affecte le contenu de $nouveau dans $ancien :)
            $ancien->nom = $nouveau->nom ;
            $ancien->prenom = $nouveau->prenom ;
            $ancien->contact = $nouveau->contact ;
            $ancien->email = $nouveau->email ;
            $ancien->numerocni = $nouveau->numerocni ;
            $ancien->genre = $nouveau->genre ;
            $ancien->profession = $nouveau->profession ;
            $ancien->statutmatrimonial = $nouveau->statutmatrimonial ;
            $ancien->login = $nouveau->login ;
            $ancien->motpasse = $nouveau->motpasse ;
            $ancien->latitude = $nouveau->latitude ;
            $ancien->longitude = $nouveau->longitude ;
            $ancien->pack = $nouveau->pack ;
            
            try {
                $ancien->save() ;
                $nouveau->delete() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        if(isset($_GET['non'])) {
            $non = $_GET['non'];
            $user = DemandeUtilisateur::find($non) ;
            
            try {
                $user->delete() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/fournisseur/confirmInscription', $msg);
            }
        }
        
    
        // le footer 
        $this->load->view('footer_administration'); 
    }

    public function supprimer() {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);

        $data = array('utilisateur' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer l'utilisateur connecté 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('utilisateur' => $u, 'erreur' => ' Erreur : Impossible de supprimer un utilisateur en cours ');
            $this->load->view('administration/personnel/supprimer', $msg);
        } else {
            try {
                $u = Utilisateur::where('id', '=', $user)->update($valeurs);
                $this->session->set_userdata('success', '1');
                header('Location: ' . base_url() . 'administration/personnel');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/personnel/confirmer', $msg);
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
            'motpasse' => '' . crypt($this->input->post('motpasse'),'st'), 
            'pack' => 1,
            'etat' => 1,
            'typeutilisateur' => 3
            
        );
        return $valeurs;
    }

}
