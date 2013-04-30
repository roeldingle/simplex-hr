<?php

class Admin_api extends MX_Controller
{
     public function __construct()
    {
        parent::__construct();
        
        
    }
    
   
    
    
    public function view_refferal(){
        echo json_encode(self::_get_data('aa_idx = "'.$this->input->post('aa_idx', TRUE).'"'));
    }
    
    public function get_application(){
    
        $iApplicantIdx = $this->input->post('aa_idx', TRUE);
        $sWhere = 'aa_idx = "'.$iApplicantIdx.'"';
        $aData = self::_get_data($sWhere);
        
        echo json_encode($aData);
    }
    
    public function _get_data($sWhere = null){
    
        $sQuery = 'SELECT 
                    *
                    FROM
                        appform_applicant as aa
                        JOIN
                        appform_position as ap
                        ON
                        aa.aa_ap_idx = ap.ap_idx
                ';
        if($sWhere != null){
            $sQuery .= ' WHERE '.$sWhere;
        }
        
        //echo($sQuery);
        
        $aData = $this->getclass->query_db($sQuery);
        
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
            
            $aData[$key]['aa_date_applied'] = date('Y-m-d i:s',$val['aa_date_applied']);
            $aData[$key]['aa_birthdate'] = date('Y-m-d',$val['aa_birthdate']);
            
            $aData[$key]['aa_emp_data'] = json_decode($val['aa_emp_data'],TRUE);
            
            
            $aData[$key]['aa_skills_data'] = json_decode($val['aa_skills_data'],TRUE);
            $aData[$key]['aa_reference_data'] = json_decode($val['aa_reference_data'],TRUE);
            $aData[$key]['aa_refferal_data'] = json_decode($val['aa_refferal_data'],TRUE);
            
            $aData[$key]['index'] = ($key+1);
        
        }
        
        return $aData;
    
    
    
    }
    
    public function delete_from_list(){
    
        $sQuery = '';
        $sIdx = implode(',', $this->input->post('aa_idx', TRUE));
		$sQuery = "DELETE FROM appform_applicant WHERE aa_idx IN(".$sIdx .")";
        
        $aData = $this->getclass->delete_in_db($sQuery);
        
        echo json_encode($aData);
    
    }
    
   

}