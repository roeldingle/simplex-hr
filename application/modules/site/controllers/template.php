<?php

class template extends MX_Controller
{
	private $sModule;

    public function __construct()
    {
        parent::__construct();
        
        

        $this->load->module("core/app");
        
    }
    
    
    public function header()
    {
        $this->app->header('site/header');
    }
    
    public function footer()
    {
        $this->app->footer('site/footer');
    }
    
    public function sidebar()
    {
        $this->app->content('site/sidebar');
    } 

    public function breadcrumbs()
    {
        $this->app->content('site/breadcrumbs');
    }      
}