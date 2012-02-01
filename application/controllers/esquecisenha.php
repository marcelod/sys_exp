<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esquecisenha extends MY_Controller {


    public function index($msg = NULL)
    {
        $this->data['title'] = NAME_SITE . " | Esqueci a Senha";

        $this->data['msg'] = $msg;

        $this->header();
        $this->load->view('esquecisenha', $this->data);
        $this->footer();
        
    }
	
    public function send(){
        if( $this->form_validation->run() == FALSE ){
            $this->index();
        }else{
            $data['email'] = $this->input->post('email');

            $this->load->model('user_model');
            $pass['password'] = $this->user_model->get_pass($data['email']);

            if($pass['password']) {
                $conf_mail['protocol'] = 'sendmail';
                $conf_mail['mailtype'] = 'html';

                $this->load->library('email');

                $this->email->initialize($conf_mail);
                $this->email->from('contato@localhost.com.br', 'Contato');
                $this->email->to($data['email']);
                $this->email->subject("[" . NAME_SITE . "] Re-envio da senha!");
                $this->email->message('Segue senha solicitada pelo site! <br /><br />'.$pass['password']);

                if($this->email->send()){
                    $this->index('<p>Senha enviada com sucesso!</p>');
                }

            } else {
                $this->index('<p>E-mail n&atilde;o encontrado</p>');
            }
            
        }

    }
    
    
}
