<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_template extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('template_model');
    }


    public function index($msg = NULL){    
        $this->data['title']  = NAME_ADMIN . " - Cadastro - Template";
        $this->data['msg'] = $msg == 'sucesso' ? '<p>Cadastrado com sucesso!</p>' : $msg;
        $this->data['table_data'] = $this->table_data();
        
        $this->admin('cadastro/template');
    }
    
    
    public function send(){
        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            
            $data['str_input_text']      = $this->input->post('str_input_text');
            $data['str_input_radio']     = $this->input->post('str_input_radio');
            $data['int_input_checkbox1'] = $this->input->post('int_input_checkbox1');
            $data['int_input_checkbox2'] = $this->input->post('int_input_checkbox2');
            $data['id_select_option']    = $this->input->post('id_select_option');
            $data['txt_textarea']        = $this->input->post('txt_textarea');
            $data['id_usuario']          = $this->session->userdata('id_usuario');
            
            $this->template_model->set_values($data);
            redirect('admin/cadastro_template/index/sucesso', 'refresh');            
        }
    }
    
    
    public function liberar(){
        $this->template_model->liberar($this->input->post('cod')); //POST RECEBIDO POR JS
    }
    
    public function delete(){
        $this->template_model->delete($this->input->post('cod')); //POST RECEBIDO POR JS
    }
    
    public function edit($id){
        $this->data['title']  = NAME_ADMIN . " - Alteração - Template";
        $this->data['edit'] = $this->template_model->get_alter($id);
        
        $this->admin('cadastro/template_edit');
    }
    
    public function alter(){        
        if($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id'));
        } else {
            $data['id']  = $this->input->post('id');
            $data['str_input_text']      = $this->input->post('str_input_text');
            $data['str_input_radio']     = $this->input->post('str_input_radio');
            $data['int_input_checkbox1'] = $this->input->post('int_input_checkbox1');
            $data['int_input_checkbox2'] = $this->input->post('int_input_checkbox2');
            $data['id_select_option']    = $this->input->post('id_select_option');
            $data['txt_textarea']        = $this->input->post('txt_textarea');
//                $data['id_usuario']          = $this->session->userdata('id_usuario');

            $this->template_model->update($data);
            $this->index('<p>Alterado com sucesso!</p>');
        }
        
    }
    
    
    public function table_data(){
        $table = '';        
        
        $table.="<table class='records'>\n";
        $table.="\t<thead>\n";
        $table.="\t\t<tr>\n";
        $table.="\t\t\t<th>ID</th>\n";
        $table.="\t\t\t<th>INPUT TEXT</th>\n";
        $table.="\t\t\t<th style='width:27px'>&nbsp;</th>\n";
        $table.="\t\t</tr>\n";
        $table.="\t</thead>\n";
        $table.="\t<tbody>\n";
        foreach ($this->template_model->get_all() as $all):
            $table.="\t\t<tr id='$all->id'>\n";
            $table.="\t\t\t<td>$all->id</td>\n";
            $table.="\t\t\t<td>$all->str_input_text</td>\n";
            $table.="\t\t\t<td class='aCenter'>";
            $table.= active_inactive($all->opt_ativo, 'admin/cadastro_template/liberar/', $all->id);
            $table.= delete_item($all->id, 'admin/cadastro_template/delete/');
            $table.= edit_item($all->id, 'admin/cadastro_template/edit/');
            $table.="\t\t\t</td>\n";
            $table.="\t\t</tr>\n";
        endforeach;
        $table.="\t</tbody>\n";
        $table.="</table>\n";
        
        return $table;
    }
    
}