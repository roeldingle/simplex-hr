define([
        /*libraries*/
        'backbone'

], function(backbone){		
         
		return  {
        
            /*will setup ajax required datas
            implementation ex:
                var formdata    = {
                    url : urls.ajax_url,
                    mod : "settings|api|get_users"
                };
                
                helpers.ajax(model,formdata).success(function(response){
                    /*ajax response checker
                    if(jQuery.isEmptyObject(response) == false){
                    
                        var parsedTemplate 	= _.template(tpl_list, {rows: response});
                        $("#real_content").html(parsedTemplate);
                        
                    }else{
                        helperView.access_denied();
                    }
                });
            
            */
            ajax: function(model,formdata){
                
                return model.save(null,{ 
                    data: formdata,
                    error:	function(model,response){
                        console.log(response);
                      }
                });
            },
            
            /*popup dialogbox
            *   options.scontainer = dom selector for the dialog box
            *   options.aoption = ui dialog options
            *   options.scontent = content of the dialog box
            *
            * @message option is for small dialog usually use to display message ex.are you sure u want to delete these item(s)
            implementation ex.
                var adialogbox_options = {
                    scontainer : null,
                    aoption : {
                        title: 'Add User',
                        width:500,
                        resizable: false,
                        modal: true
                    },
                    scontent : _.template(tpl_addform, {user_grade_rows: response.grade}) /*parsed template

                }
                helpers.dialog(adialogbox_options);
            */
            dialog: function(options){
                $(".ui-dialog-content").dialog("close");
                
                $("html, body").animate({ scrollTop: 0 }, "fast");
                
                /*if container not define*/
                if(options.scontainer == null){
                   options.scontainer = '.popup_wrap';
                    $(options.scontainer).remove();
                    var sDialogBox = '<div class="popup_wrap" style="display:none;" />';
                    $('body').append(sDialogBox);
                }
                
               $(options.scontainer).html(options.scontent);
               $(options.scontainer).dialog(options.aoption);
               
               
            
            },
            
            /*date picker*/
            datepicker: function(selector){
            
                $( selector ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "1950:+nnnn",
                        showOn: "button",
                        buttonImage: urls.assets_url+"site/images/calendar-day.png",
                        buttonImageOnly: true
                 });
                 
                 $(selector).attr('readonly','true');
            
            },
            
            /*put valiadation fields*/
            put_validate: function(){
            
                /*validate select*/
                
            
                /*put validation attr*/
                    $("#personal input:text, #personal select, [name='aa_type']")
                        .not('[name="aa_nname"],[name="mar_status"],[name="aa_home_num"],[name="aa_availability"],[name="aa_email1"],[name="aa_email2"]')
                        .attr('validate','required');
                        
                    $('[name="aa_sch_name"]').attr('validate','required');
                    
                 /*email*/
                 $('[name="aa_email1"]').attr('validate','required|email');
                 $('[name="aa_email2"]').attr('validate','email');
                 
                 /*numbers*/
                 $('[name="aa_sch_yr_grad"]')
                 .attr('validate','digits');
                 
                 /*empdata
                 $("#personal input:text").attr('validate','required');
                        
                    $('#emp_data_form input').attr('validate','required');*/
                 
                 
            },
            
            /*gather data to encode*/
            gather_minor_data: function(){
            
                var aData = new Array;
                
                var aData2 = new Array;
                    
                    /*employment data*/
                    $.each($(".emp_tb"), function(i){	
                         emp_yr_ex = $(".emp_tb:eq("+i+") input[name='emp_yr_ex[]']").val();
                         emp_mon_ex = $(".emp_tb:eq("+i+") input[name='emp_mon_ex[]']").val();
                         emp_from = $(".emp_tb:eq("+i+") input[name='emp_from[]']").val();
                         emp_to = $(".emp_tb:eq("+i+") input[name='emp_to[]']").val();
                         emp_company = $(".emp_tb:eq("+i+") input[name='emp_company[]']").val();
                         emp_pos = $(".emp_tb:eq("+i+") input[name='emp_pos[]']").val();
                         emp_res = $(".emp_tb:eq("+i+") input[name='emp_res[]']").val();
                         emp_con_num = $(".emp_tb:eq("+i+") input[name='emp_con_num[]']").val();
                         emp_address = $(".emp_tb:eq("+i+") input[name='emp_address[]']").val();
                         emp_sal_start = $(".emp_tb:eq("+i+") input[name='emp_sal_start[]']").val();
                         emp_sal_last = $(".emp_tb:eq("+i+") input[name='emp_sal_last[]']").val();
                         emp_res_leaving = $(".emp_tb:eq("+i+") input[name='emp_res_leaving[]']").val();
                         
                        /*push array*/
                        if(
                            emp_yr_ex != "" &&
                            emp_mon_ex != "" &&
                            emp_from != "" &&
                            emp_to != "" &&
                            emp_company != "" &&
                            emp_pos != "" &&
                            emp_res != "" &&
                            emp_con_num != "" &&
                            emp_address != "" &&
                            emp_sal_start != "" &&
                            emp_sal_last != "" &&
                            emp_res_leaving != "" 
                            ){
                            aData.push({
                                aa_yr_ex : emp_yr_ex,
                                aa_mon_ex : emp_mon_ex,
                                aa_emp_from : emp_from,
                                aa_emp_to : emp_to,
                                aa_emp_company : emp_company,
                                aa_emp_pos : emp_pos,
                                aa_emp_res : emp_res,
                                aa_emp_con_num : emp_con_num,
                                aa_emp_address : emp_address,
                                aa_emp_sal_start : emp_sal_start,
                                aa_emp_sal_last : emp_sal_last,
                                aa_emp_res_leaving : emp_res_leaving
                            });
                        }
            
                    });
                    
                    /*skills data*/
                    var rowCount = $('#skills_tb tr').length;
                    var counter = 1;
                     while(rowCount > counter){
                         
                         skills_name = $("input[name='skill_"+counter+"']").val();
                         skill_yr_exp = $("select[name='skill_yr_exp_"+counter+"']").val();
                         skill_prof_lvl = $("select[name='skill_prof_lvl_"+counter+"']").val();
                        
                         
                        /*push array*/
                        if(skill_yr_exp != "" && skill_prof_lvl != ""){
                            aData2.push({
                                aa_skills_name : skills_name,
                                aa_skill_yr_exp : skill_yr_exp,
                                aa_skill_prof_lvl : skill_prof_lvl
                            });
                        }
                        
                        counter++;
                    }
                    
                    /*references data*/
                    var aData3={};
                    $('#references').find('tr').each(function(){
                        var id=$(this).attr('id');
                        var row={};
                        $(this).find('input').each(function(){
                            if($(this).val() != ""){
                                row[$(this).attr('name')]=$(this).val();
                            }
                        });
                        aData3[id]=row;
                    });
                    //console.log(ref_data);
                    
                    /*refferal data*/
                    var aData4 = new Array;
                     $.each($(".refferal_tb"), function(i){	
                         refferal_name = $(".refferal_tb:eq("+i+") input[name='refferal_name[]']").val();
                         refferal_con_num = $(".refferal_tb:eq("+i+") input[name='refferal_contact_num[]']").val();
                         refferal_email = $(".refferal_tb:eq("+i+") input[name='refferal_email[]']").val();
                         refferal_position = $(".refferal_tb:eq("+i+") select[name='refferal_position[]']").val();
                        
                         
                        /*push array*/
                        if(refferal_name != "" && refferal_con_num != "" || refferal_email != "" && refferal_position != ""){
                            aData4.push({
                                aa_refferal_name : refferal_name,
                                aa_refferal_con_num : refferal_con_num,
                                aa_refferal_email: refferal_email,
                                aa_refferal_position : refferal_position
                                
                            });
                        }
            
                    });
                    
                    
                    var aReturnData = {
                        empdata : aData,
                        skillsdata: aData2,
                        referencesdata: aData3,
                        refferaldata: aData4
                    }
                    
                    return aReturnData;
            
            },
            
            
            
            /*to redirect
            *   sUrl = url of the page you want to redirect
            */
            page_redirect: function(sUrl){
                $(location).attr('href',sUrl);
            }
        
        }
	}
);