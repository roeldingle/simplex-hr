<?php
class Test_model extends CI_Model{

    private $my_module_db = '';

     function __construct(){
      parent::__construct();
      
        $this->config->load('scheduler/database');
        $my_module_db_params = $this->config->item('my_module_db');
        $this->db = $this->load->database($my_module_db_params, TRUE);
        
     }
     
     function get_test(){
     
        $query = $this->db->get('tbl_user');
         return ($query->result_array());
     
     
     }
    
}