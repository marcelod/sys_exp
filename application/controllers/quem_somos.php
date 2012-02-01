<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quem_somos extends MY_Controller {
    
    public function index(){    
        $this->data['title']  = NAME_SITE . " - Quem Somos";
        
        $this->usable('quem_somos');
    }
    
    
    
}