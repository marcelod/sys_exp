<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_acesso extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('acesso_model');
    }


    public function index($msg = NULL){
        $this->data['title']  = NAME_ADMIN . " - Cadastro - Acesso";
        $this->data['msg'] = $msg == 'sucesso' ? '<p>Cadastrado com sucesso!</p>' : $msg;
        $this->data['table_data'] = $this->table_data();
        
        $this->admin('cadastro/acesso');
    }
    
    
    public function send(){
        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['str_acesso']  = $this->input->post('acesso');
        
            $this->acesso_model->set_values($data);
            redirect('admin/cadastro_acesso/index/sucesso', 'refresh');            
        }
    }
    
    public function delete(){
        $this->acesso_model->delete($this->input->post('cod')); //POST RECEBIDO POR JS
    }
    
    public function edit($id){
        $this->data['title']  = NAME_ADMIN . " - Alteração - Acesso";
        $this->data['edit'] = $this->acesso_model->get_alter($id);
        
        $this->admin('cadastro/acesso_edit');
    }
    
    public function alter(){        
        if($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id'));
        } else {
            $data['id']  = $this->input->post('id');
            $data['str_acesso']  = $this->input->post('acesso');

            if($this->acesso_model->update($data)){
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
        $table.="\t\t\t<th>ACESSO</th>\n";
        $table.="\t\t\t<th style='width:27px'>&nbsp;</th>\n";
        $table.="\t\t</tr>\n";
        $table.="\t</thead>\n";
        $table.="\t<tbody>\n";
        foreach ($this->acesso_model->get_all() as $all):
            $table.="\t\t<tr id='$all->id'>\n";
            $table.="\t\t\t<td>$all->id</td>\n";
            $table.="\t\t\t<td>$all->str_acesso</td>\n";
            $table.="\t\t\t<td class='aCenter'>";
//            $table.= active_inactive($all->opt_ativo, 'admin/cadastro_acesso/liberar/', $all->id);
            $table.= delete_item($all->id, 'admin/cadastro_acesso/delete/');
            $table.= edit_item($all->id, 'admin/cadastro_acesso/edit/');
            $table.="\t\t\t</td>\n";
            $table.="\t\t</tr>\n";
        endforeach;
        $table.="\t</tbody>\n";
        $table.="</table>\n";
        
        return $table;
    }
    
}