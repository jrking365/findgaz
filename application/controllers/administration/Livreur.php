<?php

class Livreur extends CI_Controller{
   protected $utilisateur;

    public function __construct() {
        parent::__construct();
        $this->load->model('PointVente');
        $this->load->model('ZoneAction');
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));

        if (isset($this->utilisateur)) {
            if ($this->utilisateur->typeutilisateur != 2) {
                header('Location: ' . base_url() . 'controle47');
            }
        }else {
            header('Location: ' . base_url() . 'controle47');
        }

        $data = array('utilisateur' => $this->utilisateur->nom . ' ' . $this->utilisateur->prenom,
            'type' => $this->utilisateur->getTypeUtilisateur->libelle);
        $this->load->view('header_administration', $data);
    }
    
     public function index() {
        $data = array('liste'=> Utilisateur::where('visibilite','=','1')->where('typeutilisateur','=', TypeUtilisateur::where('code','=','liv')->get()[0]->id)->get());    
        $this->load->view('administration/livreur/liste', $data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function ajouter(){
        
        $this->verifieChamp();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/livreur/ajouter');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Utilisateur::create($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/ajouter', $msg);
            }
        }

         // le footer 
        $this->load->view('footer_administration');
    }
    
    public function  modifier(){
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $this->verifieChamp();
         $data = array('utilisateur'=>$u);
         
        if ($this->form_validation->run() == FALSE) {
           
            $this->load->view('administration/livreur/modifier', $data);
        } else {
            $val = $this->valeurFormulaire();
            try {
                $u = Utilisateur::where('id', '=', $user)->update($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/modifier', $msg);
            }
        }

        // le footer 
        $this->load->view('footer_administration');
    }
    
    public  function supprimer(){
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        $data = array('utilisateur'=>$u);
        
        $this->load->view('administration/livreur/supprimer', $data);
        
        // le footer 
        $this->load->view('footer_administration');
    }
    
    public function validersuppression () {
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $data = array('utilisateur' => $u);
        $valeurs = array('visibilite' => 0);

        /// impossible de supprimer l'utilisateur connecté 
        if ($u->id == $this->utilisateur->id) {
            $msg = array('utilisateur' => $u, 'erreur' => ' Erreur : Impossible de supprimer un utilisateur en cours ');
            $this->load->view('administration/livreur/supprimer', $msg);
        } else {
            try {
                $u = Utilisateur::where('id', '=', $user)->update($valeurs);
                $this->session->set_userdata('succes', '1');
                header('Location: ' . base_url() . 'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur' => $u, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/supprimer', $msg);
            }
        }
        
    }

        public function detail(){
       $user = $_GET['id'];
        $u = Utilisateur::find($user);
        $data = array('utilisateur'=>$u);
        
        $this->load->view('administration/livreur/detail', $data);
       // le footer 
        $this->load->view('footer_administration');  
    }
    
    public function zoneAction(){
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        //$data = array('utilisateur'=>$u);
        
        $data['pointvente'] = $this->PointVente->getAllPoint();
        
        $this->verifieChampZA();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administration/livreur/zoneAction', $data);
        }else{
            $val = $this->valeurFormulaireZA();
            try {
                $p = ZoneAction::create($val);
                $this->session->set_userdata('succes','1');
                header('Location: '.base_url().'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/zoneAction', $msg);
                
            }
        }
        
         // le footer 
        $this->load->view('footer_administration'); 
        
    }
    
    public function AccepterModification(){
        $new = array('nouveau'=>DemandeVisiteur::where('visibilite','=','1')->where('etat','=','3')->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'liv')->get()[0]->id)->get()) ;
        $data['nouveau'] = $new;
        
        if(isset($new['nouveau'][0]->nom)){
            $old = array('ancien'=>  Utilisateur::where('id', '=', DemandeVisiteur::first()->utilisateur()->first()->id)->where('typeutilisateur', '=', TypeUtilisateur::where('code', '=', 'liv')->get()[0]->id)->get()) ;
            $data['ancien'] = $old;
        }else{
            $this->session->set_userdata('erreurmodif','1');
            header('Location: '.base_url().'administration/livreur');
        }
        $this->load->view('administration/livreur/listeModification', $data);
        // le footer 
        $this->load->view('footer_administration');
        
    }
    
    public function validermodification(){
        if(isset($_GET['oui'])) {
            $oui = $_GET['oui'];
            $nouveau = DemandeVisiteur::find($oui) ;
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
                header('Location: '.base_url().'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/AccepterModification', $msg);
            }
        }
        if(isset($_GET['non'])) {
            $non = $_GET['non'];
            $user = DemandeVisiteur::find($non) ;
            
            try {
                $user->delete() ;
                $this->session->set_userdata('success','1');
                header('Location: '.base_url().'administration/livreur');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('administration/livreur/AccepterModification', $msg);
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
    
    private function verifieChampZA(){
        $this->form_validation->set_rules('libelle','le nom de la zone action', 'required|trim|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('description','description de la zone action', 'required|trim|min_length[4]|max_length[30]');  
    }
    
    private function valeurFormulaireZA(){
        $pointvente = $_POST['pointvente'];
        $p = PointVente::where('nom','=',$pointvente)->get();
        $id = $p[0]->id;
        
        $valeurs = array(
            'pointvente'=>$id,
            'livreur'=>$_GET['id'],
            'libelle'=>$this->input->post('libelle'),
            'description'=>$this->input->post('description')
           
            
        );
        return $valeurs;
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
            'typeutilisateur' => 4
            
        );
        return $valeurs;
    }
}
