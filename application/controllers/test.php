<?php

class Test extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
      // $this->load->module('core-module/site');
      // $this->common->use_css('app1/style');
   }

   public function index()
   {
      // $this->site->header('app1/header');
      // $this->load->view('index');
      // $this->site->footer('app1/footer');
   }
   
   public function test_index()
   {
      echo 123;
   }
}