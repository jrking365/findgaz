<?php



class Accueil extends CI_Controller {
    protected $utilisateur;
    protected $data;
    protected $commande;
    protected $historiqueCommande;


    public function __construct() {
        parent::__construct();
        $this->load->model('HistoriqueCommande');
        $this->load->model('Commande');
        $this->utilisateur = new Utilisateur();
        $this->utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->commande = new Commande();
        $this->historiqueCommande = new HistoriqueCommande();
        $this->load->helper('date');
        
        if (isset($this->utilisateur)) {
            if ($this->utilisateur->typeutilisateur != 4)
                header('Location: ' . base_url() . 'Controle');
        }else {
            header('Location: ' . base_url() . 'Controle');
        }
        
        $this->data = array('utilisateur' => $this->utilisateur->nom . ' ' . $this->utilisateur->prenom,
            'type' => $this->utilisateur->getTypeUtilisateur->libelle, 'id' => $this->utilisateur->id,
            'contact'=>$this->utilisateur->contact, 'email'=>$this->utilisateur->email, 
            'cni'=>$this->utilisateur->numerocni, 'profession'=>$this->utilisateur->profession,
            'statut'=>$this->utilisateur->statutùatrimonial, 'true' => 0);
        $this->load->view('livreur/header', $this->data);
    }
    
     public function index() {
        $ud = DemandeVisiteur::find($this->data['id']) ;
        //$data1 = array('liste'=>Commande::where('visibilite','=','1')->where('etat','=','11')->where('livreur','=',$this->data['id'])->get());
        if(isset($ud->id)){
            $this->data['true'] = 1 ;
        }
        $this->data['liste'] = Commande::where('etat','=','9')->where('livreur','=',$this->data['id'])->get();
        $this->data['livre'] = Commande::where('etat','=','11')->where('livreur','=',$this->data['id'])->get()->count();
        
        $this->load->view('livreur/dashboard', $this->data);
        $this->load->view('footer_administration');
    }
    
    public function modifier(){
        
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        
        $ud = DemandeVisiteur::find($user) ;
        if($ud['id'] == $u->id) {
            $this->session->set_userdata('exitDemande','1');
            header('Location: '.base_url().'livreur/accueil');
        }
        else {
         
        
            $this->verifieChamp();
             $data = array('utilisateur'=>$u);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('livreur/modifier', $data);
            } else {
                $val = $this->valeurFormulaire();
                try {

                    $u = DemandeVisiteur::create($val) ;
                    $u->id = $user ;
                    $u->save() ;

                    $this->session->set_userdata('successDemande','1');
                    header('Location: '.base_url().'livreur/accueil');

                } catch (Illuminate\Database\QueryException $exc) {
                    $msg = array('utilisateur'=>$u,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                    $this->load->view('livreur/modifier', $msg);
                }
            }
        }    
            
        // le footer 
        $this->load->view('footer_administration');
    }
   
    public function guideline(){
        $user = $_GET['id'];
        $u = Utilisateur::find($user);
        $dat = date('Y-m-d');
       
        
        $data = array('aFaire'=>Commande::where('livreur','=',$user)->where('etat','=','9')->where('date','=',$dat)->get(),
                      'enCours'=>Commande::where('livreur','=',$user)->where('etat','=','10')->where('date','=',$dat)->get(),
                      'execute'=>  Commande::where('livreur','=',$user)->where('etat','=','11')->get());
        
        $this->load->view('livreur/guideline', $data);
        //le footer
        $this->load->view('footer_administration');
    }
    
    public function ExpedierCommande(){
        $cmd = $_GET['id'];
        $c = Commande::find($cmd);
        $id = $c->livreur;
        $d = date('Y-m-d H:i:s');
        
        $valeurs = array(
            'commande'=>$cmd,
            'etat'=>10,
            'datecommande'=>  now()
        );
        try{
            $h = HistoriqueCommande::create($valeurs);
            $co = Commande::where('id','=',$cmd)->update(array('etat'=>10));
            $this->session->set_userdata('succes','1');
            header('Location: '.base_url().'livreur/accueil/guideline?id='.$id);
        } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('commande'=>$c,'erreur' => ' Erreur de données !' . $exc->errorInfo[2]);
                $this->load->view('livreur/guideline?id='.$id, $msg);
            }
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
            'etat' => 3,
            'typeutilisateur' => 4
            
        );
        return $valeurs;
    }
}