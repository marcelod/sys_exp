<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastrar extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('user_model');
    }    
    
    public function index($msg = NULL)
    {
        $this->data['title'] = NAME_SITE . " | Cadastrar novo usu&aacute;rio";

        $this->data['msg'] = $msg;

        $this->header();
        $this->load->view('cadastrar', $this->data);
        $this->footer();
        
    }
	
    public function send(){
        if( $this->form_validation->run() == FALSE ){
            $this->index();            
        }else{
            $data['str_nome']  = $this->input->post('nome');
            $data['str_login'] = $this->input->post('login');
            $data['str_email'] = $this->input->post('email');
            $data['str_pwd']   = $this->input->post('senha');
            $data['id_acesso'] = 2; //ID DE USUARIO
            
            if($this->user_model->set_values($data)){
                $this->index("<p>Cadastrado com sucesso!</p>");
            } else {
                $this->index("<p>Erro no cadastro, tente novamente!</p>");
            }
            
        }

    }
    
    
}
