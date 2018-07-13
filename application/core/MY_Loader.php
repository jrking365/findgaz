<?php

class MY_Loader extends CI_Loader{
    public function template($template_name, $vars = array(), $return=FALSE){
        if($return):
            $content = $this->view('head', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('foot', $vars, $return);
            
            return $content;
        else:
            $this->view('head', $vars);
            $this->view($template_name, $vars);
            $this->view('foot', $vars);
            
        endif;
    }
    
    public function templateAdmin($template_name, $vars = array(), $return=FALSE){
        if($return):
            $content = $this->view('admin/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('admin/footer', $vars, $return);
            
            return $content;
        else:
            $this->view('admin/header', $vars);
            $this->view($template_name, $vars);
            $this->view('admin/footer', $vars);
            
        endif;
    }
}

