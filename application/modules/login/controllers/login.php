<?php

class Login extends MX_Controller
{
    private $smodule;
    public function __construct()
    {
        parent::__construct();
        $this->smodule = strtolower(__CLASS__);
        
        $this->load->module("core/app");
        $this->app->use_css(array("source"=>"login/style","cache"=>false));
        
        $aoptions  = array(            
            'attributes'=>array('data-main' => $this->environment->assets_path.'site/js/apps/r_setup'),
            'source' => 'site/libs/require'
        );

        $this->app->use_js($aoptions);
        $this->app->use_js(array("source" =>"site/site"));    
    }

    public function index()
    {   
        /*if $_GET module is set*/
        if(isset($_GET['module'])){
        
            if($this->session->userdata('module')== true){
                if($this->session->userdata('module') != $_GET['module']){
                    self::displayLoginView();
                }else{
                    redirect($this->session->userdata('module'));
                }
               
            }else{
                /*if module is not set go back to index page*/
                self::displayLoginView();
        
            }
        }else{
            redirect('');
        }
    }
    
    private function displayLoginView()
    {
    
        $adata = array();
        $aData['title'] = "Home";
        $aData['module_destination'] = $_GET['module'];
        $this->app->header($this->smodule.'/header',$aData);
        $this->app->footer($this->smodule.'/footer');
    
    
    }
   

}
