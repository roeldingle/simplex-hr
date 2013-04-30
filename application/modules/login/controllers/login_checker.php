<?php

class Login_checker extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        self::index();
    }

    public function index()
    {   
        
            if($this->session->userdata('module')== true){
                if($this->session->userdata('module') != $this->uri->segment(1)){
                    redirect('login?module='.$this->uri->segment(1));
                    //echo "<br />redirect";
                    
                }
            }else{
                //redirect($this->uri->segment(1));
                redirect('login?module='.$this->uri->segment(1));
                
            }
        }
    

}
