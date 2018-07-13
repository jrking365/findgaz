<?php
class ControleCompte extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$this->load->view('admin/admin_page');
        $this->form_validation->set_rules('login', 'le login de connexion', 'required|trim');
        $this->form_validation->set_rules('motpasse', 'le mot de passe ', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('connexion_page');
        } else {
            $utilisateur = new Utilisateur();
            
            if(Utilisateur::connexionUser($this->input->post('login'), $this->input->post('motpasse'))){
                $u = Utilisateur::find(Utilisateur::getUtilisateur($this->input->post('login'), $this->input->post('motpasse'))[0]->id);
                //var_dump($u->nom);
                $this->session->set_userdata('utilisateur', serialize($u));
                header('Location: '.base_url().'administration/accueil');
            }else{
                 $data = array('erreur' => 'Oups, impossible de se connecter. Veuillez vérifié le login et le mot de passe.');
                 $this->load->view('connexion_page', $data);
            }
            
        }
    }
    
    public function verification(){
        $user = Utilisateur::where('login','=', $_POST['login'])
                            ->where('motpasse','=', $_POST['motpasse'])
                ->whereNotIn('typeutilisateur',[2])
                ->get();
        if(sizeof($user) > 0){
            $this->session->set_userdata('utilisateur', serialize($user[0]));
            if($user[0]->typeutilisateur == 1){
                echo base_url()."welcome";
            }else if($user[0]->typeutilisateur == 3){
                 echo base_url()."compte/accueil";
            }else if($user[0]->typeutilisateur == 4){
                 echo base_url()."livreur/accueil";
            }
            
        }else{
            echo 0;
        }
    }

}
