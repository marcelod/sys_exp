<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar_perfil extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('user_model');
    }


    public function index($msg = NULL)
    {
        $this->data['title'] = NAME_ADMIN . " | Editar Perfil";
        
        $this->data['msg'] = $msg;
        
        $this->data['dados_usuario'] = $this->user_model->get_user_id();
        
        $this->admin('editar_perfil');
    }
	
    public function alter(){
        if( $this->form_validation->run() == FALSE ){
            $this->index();
        }else{
            $data['str_nome']  = $this->input->post('nome');
            $data['str_login'] = $this->input->post('login');
            $data['str_email'] = $this->input->post('email');
            
            if($this->input->post('senha') != ''){
                $data['str_pwd'] = $this->input->post('senha');
            }
            
            if($this->user_model->editar($data)){
                $this->index("<p>Alterado com sucesso!</p>");
            } else {
                $this->index("<p>Erro na alteração!</p>");
            }
        }

    }
    
    public function alterar_avatar($msg = NULL){
        $this->data['title']  = NAME_ADMIN . " - Meus Dados - Alterar Avatar";
        
        $this->data['msg'] = $msg;
        
        $this->admin('editar_perfil_avatar');
    }
    
    
    public function alter_avatar(){
        //configuracoes para upload da imagem
        $config['upload_path'] = 'assets/upload/image_user';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload()) {
            $this->alterar_avatar($this->upload->display_errors());
        } else {
            $file_send = $this->upload->data();
            $data['str_image'] = $file_send['file_name'];
            
            //configuracoes para criacao da thumb da imagem
            $conf_thumb['image_library'] = 'gd2';
            $conf_thumb['source_image'] = 'assets/upload/image_user/'.$data['str_image'];
            $conf_thumb['new_image'] = 'assets/upload/image_user/thumb/'.$data['str_image'];
            $conf_thumb['create_thumb'] = TRUE;
            $conf_thumb['thumb_marker'] = "";
            $conf_thumb['width'] = 20;
            $conf_thumb['height'] = 20;

            $this->load->library('image_lib', $conf_thumb);

            $this->image_lib->resize();
            
            $this->load->model('user_model');
            if($this->user_model->editar($data)) {
                $this->alterar_avatar("<p>Imagem alterada com sucesso!</p>");
            } else {
                $this->alterar_avatar("<p>Erro ao alterar a imagem!</p>");
            }
        }
    }
    
    
}
