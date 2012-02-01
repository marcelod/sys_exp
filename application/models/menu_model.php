<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_menu($table, $nivel = NULL){

        //$this->db->select('id_menu, str_menu, str_link, str_alt, str_target, str_icon, id_submenu');
        $this->db->select('*');
        
        $this->db->from($table);
        $this->db->join($table.'_acesso',$table.'_acesso.id_menu = '.$table.'.id','left');

        if( ! is_null($nivel)) {
            $this->db->where($table.'.id_submenu',$nivel);
        } else {
            $this->db->where($table.'.id_submenu',NULL);
        }

        $this->db->where($table.'.opt_ativo', 1);
        $this->db->where($table.'_acesso.id_acesso', $this->session->userdata('id_acesso'));
        $this->db->order_by($table.'.int_ordem','asc');
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    public function get_submenus($id_menu, $table = 'tb_menu'){
        $query = $this->db
                ->select('str_menu, str_link, str_alt, str_target')
                ->from($table)
                ->join($table.'_acesso', $table.'_acesso.id_menu = '.$table.'.id','left')
                ->where($table.'.id_submenu', $id_menu)
                ->where($table.'.opt_ativo', 1)
                ->where($table.'_acesso.id_acesso', $this->session->userdata('id_acesso'))
                ->order_by($table.'.int_ordem','asc')
                ->get();
        
        return $query->result();
        
    }

}
