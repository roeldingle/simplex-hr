<?php

class Api extends MX_Controller
{
     public function __construct()
    {
        parent::__construct();
        /*load model class*/
        $this->load->model('login_model');
        
    }
   /***login the user***/
    public function check_login(){
    
        /*post variables*/
        $auserdata['username']   = $this->input->post('username', TRUE);
        $auserdata['password']   = $this->input->post('password', TRUE);
        $auserdata['module']   = $this->input->post('module', TRUE);
        
        /*api will check login in corresponding table using module and return true or false*/
        
        $auserdbdata = $this->login_model->check_login_user($auserdata);
        
        if(!empty($auserdbdata)){
            $breturn = true;
            
            /*session variables*/
            $this->session->set_userdata('userid',$auserdbdata['tu_username']);
            $this->session->set_userdata('password',$auserdbdata['tu_password']);
            $this->session->set_userdata('usergradeid',$auserdbdata['tu_tug_idx']);
            $this->session->set_userdata('module',$auserdata['module']);
            
        }else{
            $breturn = false;
        }
        
        echo json_encode($breturn);
    }

}