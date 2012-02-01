<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public $table = "tb_usuario";

    public function __construct(){
        parent::__construct();
    }

    public function get_login($login)
    {
        $query = $this->db
                    ->where('str_login', $login)
                    ->or_where('str_email', $login)
                    ->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    public function get_all_date() {
        $query = $this->db
                  ->select('u.*, a.str_acesso')
                  ->from("$this->table u")
                  ->join('tb_acesso a', 'a.id = u.id_acesso')                  
                  ->where('u.opt_excluido','0')
                  ->order_by('u.str_nome ASC')
                  ->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    public function get_pass($data = NULL) {
        $query = $this->db
                ->select('str_pwd')
                ->where('str_email', $data)
                ->get($this->table);

        if ($query->num_rows() > 0) {
            $row = $query->result();
            return $row[0]->str_pwd;
        }

        return FALSE;
    }
    
    
    public function get_user_id()
    {
        $this->db->where('id', $this->session->userdata('id_usuario'));
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function get_alter($id){
        return $this->db
                ->where('id', $id)
                ->get($this->table)
                ->row();
    }
    
    
    public function set_values($dados){
        return $this->db->insert($this->table, $dados);
    }
    
    
    public function avatar_user() {
        return $this->db
                ->select('str_image')
                ->where('id', $this->session->userdata('id_usuario'))
                ->get($this->table)
                ->row();
    }   
    
    
    public function editar($dados)
    {
        $this->db->where('id', $this->session->userdata('id_usuario'));
        return $this->db->update($this->table, $dados); 
    }
    
    
    public function update($dados){
        return $this->db
                ->where('id', $dados['id'])
                ->update($this->table, $dados);
    }
    
    public function liberar($cod){
        $result = $this->db
                ->select('opt_ativo')
                ->from($this->table)
                ->where('id', $cod)
                ->get()
                ->result();
        
        $data['opt_ativo'] = $result[0]->opt_ativo == 0 ? 1 : 0;
        
        return $this->db
                ->where('id', $cod)
                ->update($this->table, $data);
    }

    public function delete($cod){
        return $this->db
                ->where('id', $cod)
                ->update($this->table, array('opt_excluido'=>'1'));
//                ->delete($this->table);
    
    }

}
