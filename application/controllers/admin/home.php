<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
    /*
     * verifica se exite sessão criada
     * caso não exista chama tela para usuario efetuar login
     */
    public function index($msg = NULL)
    {
        $this->data['title'] = NAME_ADMIN . " | Login";

        $this->data['msg'] = $msg;

        if( ! $this->session->userdata('logAdm')) {
            $this->header_adm();
            $this->load->view('admin/login', $this->data);
            $this->footer_adm();
        } else {
            $this->admin('logado');
        }
        
    }
    

    /*
     * verificação dos dados enviados
     */
    public function send()
    {
        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['LOGIN'] = $this->input->post('login');
            $data['SENHA'] = $this->input->post('senha');

            $this->valida_login($data);
        }
    }

    /*
     * validação do login e senha
     */
    private function valida_login($login) {
        $this->load->model('user_model');
        $data['vLogin'] = $this->user_model->get_login($login['LOGIN']);

        if($data['vLogin']){
            if($login['SENHA'] == $data['vLogin'][0]->str_pwd){
                //se tudo estiver certo cria sessão
                $this->logado($data['vLogin'][0]);
            } else {
                $this->index('<p>Nome de usu&aacute;rio ou senha inv&aacute;lido!</p>');
            }
        } else {
            $this->index('<p>Nome de usu&aacute;rio ou senha inv&aacute;lido.</p>');
        }
    }

    /*
     * cria as sessões necessárias para se manter no sistema
     */
    private function logado($user){
        $newdata = array(
               'id_usuario'   => $user->id,
               'id_acesso'    => $user->id_acesso,
               'str_login'    => $user->str_login,
               'str_nome'     => $user->str_nome,
               'str_email'    => $user->str_email,
               'id_theme'     => $user->id_theme,
               'logAdm'       => TRUE
           );

        if( ! $this->session->userdata('logAdm')){
            $this->session->set_userdata($newdata);
        }
        $this->data['title'] = NAME_ADMIN;
        $this->admin('logado');
    }


    /*
     *  Destroi as sessões criadas
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'admin', 'refresh');
    }
	
}