<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regulamento extends MY_Controller {
    
    public function index(){    
        $this->data['title']  = NAME_SITE . " - Regulamento";
        
        $this->usable('regulamento');
    }
    
    
    
}