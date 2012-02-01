<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_usuarios extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }


    public function index($msg = NULL){
        $this->data['title']  = NAME_ADMIN . " - Cadastro - Usu&aacute;rios";
        $this->data['msg'] = $msg == 'sucesso' ? '<p>Cadastrado com sucesso!</p>' : $msg;
        $this->data['table_data'] = $this->table_data();
        
        $this->load->model('acesso_model');
        $this->data['acessos'] = $this->acesso_model->get_all();
        
        $this->admin('cadastro/usuarios');
    }
    
    
    public function send(){
        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['str_nome']  = $this->input->post('nome');
            $data['str_login'] = $this->input->post('login');
            $data['str_email'] = $this->input->post('email');
            $data['str_pwd']   = $this->input->post('senha');
            $data['id_acesso'] = $this->input->post('acesso');
            
            $this->user_model->set_values($data);
            redirect('admin/cadastro_usuarios/index/sucesso', 'refresh');            
        }
    }
    
    
    public function liberar(){
        $this->user_model->liberar($this->input->post('cod')); //POST RECEBIDO POR JS
    }
    
    public function delete(){
        $this->user_model->delete($this->input->post('cod')); //POST RECEBIDO POR JS
    }
    
    public function edit($id){
        $this->data['title']  = NAME_ADMIN . " - Alteração - Usu&aacute;rio";
        $this->data['edit'] = $this->user_model->get_alter($id);
        
        $this->load->model('acesso_model');
        $this->data['acessos'] = $this->acesso_model->get_all();
        
        $this->admin('cadastro/usuarios_edit');
    }
    
    public function alter(){        
        if($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id'));
        } else {
            $data['id']  = $this->input->post('id');
            $data['str_nome']  = $this->input->post('nome');
            $data['str_login'] = $this->input->post('login');
            $data['str_email'] = $this->input->post('email');
            if($this->input->post('senha') != ''){
                $data['str_pwd'] = $this->input->post('senha');
            }            
            $data['id_acesso'] = $this->input->post('acesso');

            if($this->user_model->update($data)){
                $this->index("<p>Alterado com sucesso!</p>");
            } else {
                $this->index("<p>Erro na alteração!</p>");
            }
        }
        
    }
    
    
    public function table_data(){
        $table = '';        
        
        $table.="<table class='records'>\n";
        $table.="\t<thead>\n";
        $table.="\t\t<tr>\n";
        $table.="\t\t\t<th>ID</th>\n";
        $table.="\t\t\t<th>NOME</th>\n";
        $table.="\t\t\t<th>LOGIN</th>\n";
        $table.="\t\t\t<th>E-MAIL</th>\n";
        $table.="\t\t\t<th>PASSWORD</th>\n";
        $table.="\t\t\t<th>ACESSO</th>\n";
        $table.="\t\t\t<th style='width:27px'>&nbsp;</th>\n";
        $table.="\t\t</tr>\n";
        $table.="\t</thead>\n";
        $table.="\t<tbody>\n";
        foreach ($this->user_model->get_all_date() as $all):
            $table.="\t\t<tr id='$all->id'>\n";
            $table.="\t\t\t<td>$all->id</td>\n";
            $table.="\t\t\t<td>$all->str_nome</td>\n";
            $table.="\t\t\t<td>$all->str_login</td>\n";
            $table.="\t\t\t<td>$all->str_email</td>\n";
            $table.="\t\t\t<td>$all->str_pwd</td>\n";
            $table.="\t\t\t<td>$all->str_acesso</td>\n";
            $table.="\t\t\t<td class='aCenter'>";
            $table.= active_inactive($all->opt_ativo, 'admin/cadastro_usuarios/liberar/', $all->id);
            $table.= delete_item($all->id, 'admin/cadastro_usuarios/delete/');
            $table.= edit_item($all->id, 'admin/cadastro_usuarios/edit/');
            $table.="\t\t\t</td>\n";
            $table.="\t\t</tr>\n";
        endforeach;
        $table.="\t</tbody>\n";
        $table.="</table>\n";
        
        return $table;
    }
    
}