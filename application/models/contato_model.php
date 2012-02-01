<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {
    
    public $table = "tb_contato";

    public function __construct(){
        parent::__construct();
    }

    
    public function set_values($dados){
        return $this->db->insert($this->table, $dados);
    }

}
