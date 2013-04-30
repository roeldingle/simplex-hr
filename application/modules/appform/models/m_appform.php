<?php
class Appform_model extends CI_Model{

    private $my_module_db = '';

     function __construct(){
      parent::__construct();
      
        $this->config->load('login/database');
        $my_module_db_params = $this->config->item('my_module_db');
        $this->db = $this->load->database($my_module_db_params, TRUE);
        
     }
     
    
}