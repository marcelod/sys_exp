<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends MY_Controller {

    public function index($msg = NULL)
    {
        $this->data['title'] = NAME_SITE . " - Contato";

        $this->data['msg'] = $msg;

        $this->usable('contato');
        
    }
	
    public function send(){
        if( $this->form_validation->run() == FALSE ){
            $this->index();            
        }else{
            $data['str_nome']   = $this->input->post('nome');
            $data['str_email']  = $this->input->post('email');
            $data['str_titulo'] = $this->input->post('titulo');
            $data['txt_msg']    = $this->input->post('mensagem');
            $data['id_usuario'] = $this->session->userdata('id_usuario');
            
            $this->load->model('contato_model');
            if($this->contato_model->set_values($data)){
                $this->index("<p>Cadastrado com sucesso!</p>");
            } else {
                $this->index("<p>Erro no cadastro, tente novamente!</p>");
            }
            
        }

    }
    
    
}
