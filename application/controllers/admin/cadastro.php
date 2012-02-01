<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends MY_Controller {
    
    public function index(){
    
        $this->data['title']  = NAME_ADMIN . " - Cadastro";
        
        $this->load->model('menu_model');
        $this->data['smenus'] = $this->menu_model->get_submenus('1', 'tb_sys_menu');
        
        $this->admin('lista_subm');
    }
    
    
    
}