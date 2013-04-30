<?php
class Login_model extends CI_Model{

    private $my_module_db = '';

     function __construct(){
      parent::__construct();
      
        $this->config->load('login/database');
        $my_module_db_params = $this->config->item('my_module_db');
        $this->db = $this->load->database($my_module_db_params, TRUE);
        
     }
     
     function check_login_user($auserdata){
     
        switch($auserdata['module']){
            case 'appform':
            $query_usergrade = 4;
            break;
            
            case 'scheduler':
            $query_usergrade = 10;
            break;
        
        }
     
        $query_string = 
            sprintf("SELECT * FROM tbl_user WHERE tu_username='%s'
            AND tu_password='%s' AND tu_tug_idx='%s' AND tu_active = 1",
            $auserdata['username'],
            hash("sha512",$auserdata['password']),
            $query_usergrade);
            
        $query = $this->db->query($query_string);

       return $query->row_array();
     
     
     }
    
}