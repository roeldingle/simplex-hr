<?php

class Appform extends MX_Controller
{
    private $smodule;
    public function __construct()
    {
        parent::__construct();
        $this->sclass = strtolower(__CLASS__);
        
        $this->load->module("core/app");
        $this->load->module("site/template");
        $this->load->module("login/login_checker");
        
        $this->load->model('getclass');
       
       $this->app->use_css(array("source"=>"site/style","cache"=>false));
        $this->app->use_css(array("source"=>"appform/style","cache"=>false));
       
        $aOptions  = array(            
            'attributes'=>array('data-main' => $this->environment->assets_path.'site/js/apps/r_setup'),
            'source' => 'site/libs/require'
        );

        $this->app->use_js($aOptions);
        
        $this->app->use_js(array("source"=>"site/libs/jquery.validate.min","cache"=>false));
        $this->app->use_js(array("source" =>"site/site"));  
    }

    public function index()
    {
        $aCategories = $this->getclass->query_db('SELECT DISTINCT ap_category FROM appform_position');
        $this->app->header($this->sclass.'/v_header.php');
        $this->app->content($this->sclass.'/v_'.$this->sclass.'.php');
        $this->app->footer($this->sclass.'/v_footer.php');
         
         
    }
    
    public function get_position_menu(){
    
        $sData = '';
        $aCategories = $this->getclass->query_db('SELECT DISTINCT ap_category FROM appform_position');
        
        $aData = $this->getclass->select('appform_position');
        
        foreach($aCategories as $key=>$val){
            
            $sData .= '<optgroup label="'.ucwords($val["ap_category"]).'">';
            
                foreach($this->getclass->select('appform_position','ap_category ="'.$val["ap_category"].'"') as $key2=>$val2){
                    $sData .= '<option value="'.$val2['ap_idx'].'">'.ucwords($val2['ap_name']).'</option>';
                }
            
            $sData .= '</optgroup>';
        
        }
        
        
        echo $sData;
    
    }
    
    public function get_skills(){
        
        $sData = '';
        $aData = $this->getclass->select('appform_skills');
        $i = 1;
        foreach($aData as $key=>$val){
        
            $sData .= '<tr><th><input type="hidden" value="'.strtoupper($val['as_name']).'" name="skill_'.$i.'" /> 
                        <label>'.strtoupper($val['as_name']).'</label></th>';
            $sData .= '<td>
                        <select name="skill_yr_exp_'.$i.'" class="select_type_4 nm">
                            <option value="" >--- select ---</option>
                            <option>Less than 1 year</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>More than 5 year</option>
                        </select>
                    </td>';
            $sData .= ' <td>
                            <select name="skill_prof_lvl_'.$i.'"  class="select_type_4 nm">
                                <option value="" >--- select ---</option>
                                <option value="Beginner" >Beginner</option>
                                <option value="Intermediate" >Intermediate</option>
                                <option value="Advance" >Advance</option>
                                <option value="Professional" >Professional</option>
                            </select>
                        </td>';
            $sData .= '<td></td></tr>';
            $i++;
            
        }
         $sData .= '<input type="hidden" id="db_tot_num_skills" value="'.$i.'"/>';
        
        
        echo $sData;
    
    }
    

}