<?php

class Scheduler extends MX_Controller
{
    private $smodule;
    public function __construct()
    {
        parent::__construct();
        
        $this->sclass = strtolower(__CLASS__);
        
        $this->load->module("core/app");
        $this->load->module("site/template");
        $this->load->model('test_model');
        $this->load->module("login/login_checker");
       
       $this->app->use_css(array("source"=>"site/style","cache"=>false));
       $this->app->use_css(array("source"=>"scheduler/style","cache"=>false));
       
        $aOptions  = array(            
            'attributes'=>array('data-main' => $this->environment->assets_path.'site/js/apps/r_setup'),
            'source' => 'site/libs/require'
        );

        $this->app->use_js($aOptions);
        $this->app->use_js(array("source" =>"site/site"));    
    }

    public function index()
    {
        $this->app->header($this->sclass.'/v_header.php');
        $this->app->content($this->sclass.'/v_'.$this->sclass.'.php');
        //$this->app->footer($this->sclass.'/v_footer.php');
        $this->template->footer();
        
         
    }
    
    

}