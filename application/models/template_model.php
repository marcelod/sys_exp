<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_model extends CI_Model {
    
    public $table = "tb_template";

    public function __construct(){
        parent::__construct();
    }

    public function get_all(){
        return $this->db
                    ->where('opt_excluido', 0)
                    ->get($this->table)
                    ->result();
    }
    
    
    public function get_all_active(){
        return $this->db
                    ->where('opt_ativo', 1)
                    ->where('opt_excluido', 0)
                    ->order_by('str_input_text ASC')
                    ->get($this->table)
                    ->result();
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
