<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme_model extends CI_Model {
    
    public $table = "tb_theme";

    public function __construct(){
        parent::__construct();
    }

    public function get_all()
    {
        $query = $this->db
                    ->order_by('str_theme', 'ASC')
                    ->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    public function get_theme(){        
        $query = $this->db
                    ->select('t.str_folder_name as name')
                    ->from('tb_usuario u')
                    ->join($this->table . ' t', 't.id = u.id_theme', 'left')
                    ->where('u.id', $this->session->userdata('id_usuario'))
                    ->get();
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return NAME_THEME;
        }
    }
    
    
    
    
    
    public function set_values($dados){
        return $this->db->insert($this->table, $dados);
    }
    
    public function get_alter($id){
        return $this->db
                ->where('id', $id)
                ->get($this->table)
                ->row();
    }
    
    public function update($dados){
        return $this->db
                ->where('id', $dados['id'])
                ->update($this->table, $dados);
    }
    
    public function delete($cod){
        return $this->db
                ->where('id', $cod)
//                ->update($this->table, array('opt_excluido'=>'1'));
                ->delete($this->table);
    
    }

    
}
