<?php

class Test extends CI_Controller{
    public function __construct() {
        parent::__construct();
       
        //$this->load->view('head');
        //$this->load->view('foot');
    }
    
    public function index(){
        //echo CI_VERSION;
        $this->load->template('page');
    }
}

