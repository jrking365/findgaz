<?php

class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();  
        $this->load->helper('url');
    }
 
    public function switchLang($language = "") {
        
        $lang = ($language != "") ? $language : "french";
        $this->session->set_userdata('site_lang', $lang);
        //echo $this->session->userdata('site_lang');
        //var_dump($this->session->userdata('test'));
        //redirect($_SERVER['HTTP_REFERER']);
        header('Location: '.$_SERVER['HTTP_REFERER']);
        
    }
}