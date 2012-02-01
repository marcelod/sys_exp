<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function insert_log($dados){
        return $this->db->insert('tb_log', $dados);
    }
    
}
