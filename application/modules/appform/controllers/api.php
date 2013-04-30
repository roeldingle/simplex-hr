<?php

class Api extends MX_Controller
{
     public function __construct()
    {
        parent::__construct();
        
        
    }
    
    /*check if admin-logged in**************************************************************************************************/
    public function checkAdmin(){
        
        $sResult =($this->session->userdata('password') == $this->input->post('re-admin-pass', TRUE))? true : false;
        echo json_encode($sResult);
        
    }
    
    /*save */
    public function save_applicant_data(){
        /*catch the serialized data*/
        $aData = $this->common_lib->urldecode_to_array($this->input->post('per_data', TRUE));
        
        $aInsertData = array();
        
        /*loop for the data to insert*/
        foreach($aData as $key=>$val){
            if($val != ""){
                $aInsertData[$key] = $val;
            }
        }
        
        $aInsertData['aa_birthdate'] = strtotime($aData['aa_birthdate']);
        
        /*none required data*/
        if(isset($aData['aa_sch_date_comp'])){$aInsertData['aa_sch_date_comp'] = strtotime($aData['aa_sch_date_comp']);}
        $aInsertData['aa_emp_data'] = (json_encode($this->input->post('emp_data', TRUE)) == false) ? "none" : json_encode($this->input->post('emp_data', TRUE));
        $aInsertData['aa_skills_data'] = (json_encode($this->input->post('skills_data', TRUE)) == false) ? "none" : json_encode($this->input->post('skills_data', TRUE));
        $aInsertData['aa_reference_data'] = (json_encode($this->input->post('reference_data', TRUE)) == false) ? "none" : json_encode($this->input->post('reference_data', TRUE));
        $aInsertData['aa_refferal_data'] = ($this->input->post('refferal_data', TRUE) == "null") ? "false" : json_encode($this->input->post('refferal_data', TRUE));
        
        
        $aInsertData['aa_date_applied'] = time() - 21600;
        $sResult = ($this->db->insert('appform_applicant',$aInsertData)) ? true: false;
     
        echo json_encode($sResult);
      
    }
    
    
    public function get_position_menu_ajax(){
    
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
        
        
        echo json_encode($sData);
    
    }
    
   

}