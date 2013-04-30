<?php
class Admin extends MX_Controller
{
    private $smodule;
    public function __construct()
    {
        parent::__construct();
        $this->sclass = strtolower(__CLASS__);
        
        $this->load->module("core/app");
        $this->load->module("site/template");
        
        $this->load->module("login/login_checker");
        
        $this->app->use_css(array('attributes'=>array('media' => 'all'),"source"=>"core/style","cache"=>false));
        $this->app->use_css(array("source"=>"appform/admin","cache"=>false));
       
        $aOptions  = array(            
            'attributes'=>array('data-main' => $this->environment->assets_path.'site/js/apps/r_setup'),
            'source' => 'site/libs/require'
        );

        $this->app->use_js($aOptions);
        $this->app->use_js(array("source"=>"site/site","cache"=>false));
        $this->app->use_js(array("source"=>"site/libs/table.sorter","cache"=>false));
        $this->app->use_js(array("source"=>"site/libs/jquery.printElement","cache"=>false));
        $this->app->use_js(array("source" =>"site/site"));  
    }

    public function index()
    {
    
        /*get variables*/
        $sDefaultfromDate = '2008-08-26';
        $sPresentDate = date('Y-m-d');

        $sFromDate = (isset($_GET['date_from'])) ? $_GET['date_from'] : $sDefaultfromDate;
        $sToDate = (isset($_GET['date_to'])) ? $_GET['date_to'] : $sPresentDate;
        $sPosition = (isset($_GET['position'])) ? $_GET['position'] : 'all';
        $sName = (isset($_GET['name'])) ? $_GET['name'] : '';
        
         
         
        /*required variables*/
        $aDbData = self::get_table_rows($sFromDate,$sToDate,$sPosition,$sName);
        $aData['db_table_rows'] = $aDbData['tb_rows'];
        
        /*if row has data*/
        if($aDbData['tb_row_count'] != 0){
            $aData['get_pagination'] = self::get_pagination($aDbData['tb_row_count'],$aDbData['tb_default_limit']);
        }else{
            $aData['get_pagination'] = '';
        }
        
        /*if get name exist*/
        $aData['get_name'] = $sName;
        
        $aData['defaults'] = array(
                "from_date" => date('Y-m-d',strtotime($sFromDate)),
                "to_date" => date('Y-m-d',strtotime($sToDate))
            );
        
        /*display functions*/
        $this->app->header('appform/v_admin_header.php');
        $this->app->content('appform/v_'.$this->sclass.'.php',$aData);
        $this->app->footer('appform/v_footer.php');
         
         
    }
    
     public function get_table_rows($sFromDate,$sToDate,$sPosition,$sName){
     
        /*string setter*/
        $sData = '';
        
        /*default row limit*/
        $iDefaultLimit = 5;
        
        /*main query*/
        $sQuery = 'SELECT 
                    *
                    FROM
                        appform_applicant as aa
                        JOIN
                        appform_position as ap
                        ON
                        aa.aa_ap_idx = ap.ap_idx';
                        
         /*Where values*/
         if(isset($_GET['date_from']) && isset($_GET['date_to'])){
            $sQuery .=" WHERE aa_date_applied >= ".(strtotime($sFromDate)+ 21600)." AND aa_date_applied <= ".(strtotime($sToDate)+ 21600);
         }
         
         /*position search*/
         if($sPosition != 'all'){
            $sQuery .= " AND aa_ap_idx = ".$sPosition;
         }
         
         /*name search*/
         if($sName != ''){
            $sQuery .= " AND aa_fname LIKE '%".$sName."%' OR aa_lname LIKE '%".$sName."%'";
         }
         
         /*actual total db rows*/
         $iDbTotRows = count($this->getclass->query_db($sQuery));
         
         /*set sql oofset,limit*/
        $aLimit = $this->common->sql_limit($iDbTotRows,$iDefaultLimit);
                      
         /*limit of rows in table*/    
        if($aLimit['offset'] >= 0){         
            $sQuery .= ' LIMIT '.$aLimit['offset'].','.$aLimit['limit'];
        }
        
        
        
        /*main display array*/         
        $aData = $this->getclass->query_db($sQuery);
        
        /*modify the array return*/
        $aData = self::modify_data($aData);
        
        if(!empty($aData)){
            /*loop for display*/
            foreach($aData as $key=>$val){
                $sData .= '<tr>
                        <td><input type="checkbox" name="aa_idx[]" id="'.$val['aa_idx'].'" /></td>
                        <td>'.$val['index'].'</td>
                        <td><a href="#" class="view_application" id="'.$val['aa_idx'].'" >'.$val['aa_fname'].' '.$val['aa_mname'].' '.$val['aa_lname'].'</a></td>
                        <td>'.$val['ap_name'].'</td>
                        <td>';
                        
                        if($val['aa_refferal_data'] != "false"){
                        $sData .= '<a href="#" class="btn_vmd btn_vmd_1 referral_view" alt="'.$val['aa_idx'].'" >V</a>';
                        }
                        
                     $sData .= '</td>
                        <td>'.$val['aa_date_applied'].'</td>
                    </tr>';
            }
        }else{
            $sData .= '<tr><td colspan="6" style="text-align:center;" >No result(s) found.</td></tr>';
        }
        
        /*return variables*/
        $aDbData['tb_rows'] = $sData;
        $aDbData['tb_row_count'] = $iDbTotRows;
        $aDbData['tb_row_limit'] = $aLimit['limit'];
        $aDbData['tb_default_limit'] = $iDefaultLimit;
        
        
        return $aDbData;
    
    }
    
    public function modify_data($aData){
    
        /*modify data*/
        foreach($aData as $key=>$val){
            $aData[$key]['aa_fname'] = ucwords($val['aa_fname']);
            $aData[$key]['aa_mname'] = ucwords($val['aa_mname']);
            $aData[$key]['aa_lname'] = ucwords($val['aa_lname']);
            
            $aData[$key]['aa_gender'] = ($val['aa_gender'] != 'm') ? 'Female' : 'Male';
            
            /*marital status*/
            switch($val['aa_marital_stat']){
                case 1;
                $aa_marital_stat = "Single";
                break;
                
                 case 2;
                $aa_marital_stat = "Married";
                break;
                
                 case 3;
                $aa_marital_stat = "Widow";
                break;
                
                 case 4;
                $aa_marital_stat = "Separated";
                break;
            
            }
            $aData[$key]['aa_marital_stat'] = $aa_marital_stat;
            
            $aData[$key]['aa_date_applied'] = date('Y-m-d h:i',$val['aa_date_applied']);
            $aData[$key]['aa_birthdate'] = date('Y-m-d h:i',$val['aa_birthdate']);
            $aData[$key]['index'] = ($key+1);
        
        }
        
        return $aData;
    
    }
    
    public function get_position_menu(){
    
        $sData = '';
        $sPosition = (isset($_GET['position'])) ? $_GET['position'] : 'all';
        
        $aCategories = $this->getclass->query_db('SELECT DISTINCT ap_category FROM appform_position');
        
        $aData = $this->getclass->select('appform_position');
        
        foreach($aCategories as $key=>$val){
            
            $sData .= '<optgroup label="'.ucwords($val["ap_category"]).'">';
            
                foreach($this->getclass->select('appform_position','ap_category ="'.$val["ap_category"].'"') as $key2=>$val2){
                    $sData .= '<option value="'.$val2['ap_idx'].'"';
                    
                        if($sPosition != 'all'){
                            $sData .= ($val2['ap_idx'] == $sPosition) ? 'selected' : '';
                        }
                    
                    $sData .= '>'.ucwords($val2['ap_name']).'</option>';
                }
            
            $sData .= '</optgroup>';
        
        }
        
        
        echo $sData;
    
    }
    
    /*pagination function*/
    public function get_pagination($iRowCount,$iLimit){
        $sData = $this->common->pager($iRowCount,$iLimit);
        return $sData;
    }
    
    
    

}