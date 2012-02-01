<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acesso_model extends CI_Model {
    
    public $table = "tb_acesso";

    public function __construct(){
        parent::__construct();
    }

    public function get_all()
    {
        $query = $this->db
                    ->order_by('str_acesso', 'ASC')
                    ->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
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
