define([
		/*libraries*/
        'underscore','backbone','text',
        
        /*custom helpers*/
        'helpersPath/appform-helpers',
        
        /*template*/
        'text!tmplsPath/tpl_employment_tb.html',
        'text!tmplsPath/tpl_skills_row.html',
        'text!tmplsPath/tpl_message.html',

         /*model*/
        'modelsPath/appform-model'		
		], 
         
    function(
        /*libraries*/
        _,backbone,text,
        
        /*helper*/
        helpers,
        
        /*template*/
        tpl_emp_tb,
        tpl_skills_tb,
        tpl_message,
        
        /*model*/
        model
        
        ){	
        
        var model = new model.defAjax();
        
        		
		var views =   Backbone.View.extend({
                
                /*set array data*/
                aEmpData : new Array,
                
                /*backbone selector*/
                el: "body",
                
                /*backbone events*/
				events: {
                    'click #submit_ref_btn' : 'submit_ref_btn_clicked',
                    'click #skip_ref_btn' : 'skip_ref_btn_clicked',
                    'click #apply_btn' : 'apply_clicked',
                    'click .add_emp_tb' : 'add_emp_tb',
                    'click #application_complete' : 'application_complete',
                    
                    /*minor*/
                    'change .hasDatepicker' : 'datepicker_remove_error',
                    'click .add_skills_tb' : 'add_skils_row',
                    'click .remove_skills' : 'remove_skills',
                    'click #open_refferal' : 'open_refferal',
                    
                    "click #admin-page-link" : "goToAdminClicked",
                    "click #login-to-admin-btn" : "loginToAdmin"
				},
                
                 /*on load function*/
                initialize:  function(){
                
                    this.init_display();
                    
                    
				},
                
                
                init_display: function(){
                
                    /*set validate fields*/
                    helpers.put_validate();
                        
                   /*date pickers*/   
                   
                    helpers.datepicker("#aa_birthdate");  
                    helpers.datepicker("#aa_sch_date_comp");  
                    helpers.datepicker("#emp_from");
                    helpers.datepicker("#emp_to"); 
                    
                },
                
                
                apply_clicked: function(){
                    
                    var bValid = $('#app_form').validateForm();
                    
                   if(bValid ==  true){
                    
                    var adialogbox_options = {
                        scontainer : null,
                        aoption : {
                            title: 'Message',
                            width:300,
                            resizable: false,
                            modal: true,
                            position: 'top'
                        },
                        scontent : _.template(tpl_message,{message: 1})

                    }
                    helpers.dialog(adialogbox_options);
                     
                    }
                
                },
                
                submit_ref_btn_clicked: function(){
                
                    var aPerData = $('#app_form').serialize();
                    var aData = helpers.gather_minor_data();
                    
                    
                    this.applicant_save(aPerData,aData);
                },
                
                
                 skip_ref_btn_clicked: function(){
                
                    var aPerData = $('#app_form').serialize();
                    var aData = helpers.gather_minor_data();
                    
                    /*empty referral*/
                    aData.refferaldata = null;
                    
                    this.applicant_save(aPerData,aData);
                },
                
                
                
                /*save data*/
                applicant_save: function(aPerData,aData){
                    
                    var formdata    = {
                        url : urls.ajax_url,
                        mod : "appform|api|save_applicant_data",
                        per_data: aPerData,
                        emp_data: aData.empdata,
                        skills_data: aData.skillsdata,
                        reference_data: aData.referencesdata,
                        refferal_data: aData.refferaldata
                    }
                    
                    helpers.ajax(model,formdata).success(function(response){
                    
                        /*ajax response checker*/
                        if(response == true){
                           
                           var adialogbox_options = {
                            scontainer : null,
                            aoption : {
                                title: 'Message',
                                width:300,
                                resizable: false,
                                modal: true
                            },
                            scontent : _.template(tpl_message,{message: 2})

                        }
                        helpers.dialog(adialogbox_options);
                           
                        }else{
                            console.log('error');
                        }
                        
                    });
                
                },
                
                open_refferal: function(){
                    $(".ui-dialog-content").dialog("close");
                    
                   var aoption = {
                        title: 'Referral slip',
                        width:1020,
                        resizable: false,
                        modal: true
                    }
                  $('#refferal_dialog').dialog(aoption);
                  
                },
                
                
                add_emp_tb: function(){
                        
                        var imax = 2;
                        var itable = $('.emp_tb').size();
                        
                        if(itable <= imax){
                            var parsedTemplate 	= _.template(tpl_emp_tb, {idx: $('.emp_tb').size()});
                            $("#employment").append(parsedTemplate);
                            
                            helpers.datepicker("#emp_form_"+itable);
                            helpers.datepicker("#emp_to_"+itable);
                            
                        }else{
                            $('.add_emp_tb').css('display','none');
                          
                    }
                
                },
                
                add_skils_row: function(){
                    
                    var ilimit = 7;
                    var imax = parseInt($('#db_tot_num_skills').val()) + ilimit;
                    
                     if($('#skills_tb tr').size() <= imax){
                        var parsedTemplate 	= _.template(tpl_skills_tb, {idx: $('#skills_tb tr').size(),asset_url: urls.assets_url});
                        $("#skills_tb").append(parsedTemplate);
                       
                    }else{
                        $('.add_skills_tb').hide();
                        
                    }
                    
                },
                
                remove_skills: function(e){
                
                    $(e.currentTarget).parents('tr').remove();
                    $('.add_skills_tb').show();

                },
                
                application_complete: function(){
                    
                    $('.ui-dialog-content').dialog('close');
                    helpers.page_redirect(urls.base_url);
                
                
                },
                
                /*go to admin*/
                goToAdminClicked: function(){
                    /*html content for logout*/
                    var shtmlcontent = '<p>Re-type your admin password <span><input type="password" id="login-to-admin-txt" style="text-align:center" /></span></p>';
                        shtmlcontent += '<a href="#" id="login-to-admin-btn" class="btn btn_type_3 btn_space" style="margin:5px 0 10px 0" ><span>Continue</span></a>';
                        
                     /*ui dialog options*/
                    var adialogbox_options = {
                        scontainer : 'message',
                        aoption : {
                            title: 'Admin access',
                            width:350,
                            resizable: false,
                            modal: true
                        },
                        scontent : shtmlcontent

                    }
                   
                   Site.dialog_box(adialogbox_options);
                
                },
                
                /*login to admin page*/
                loginToAdmin: function(){
                    
                    var admin_pass = $('#login-to-admin-txt').val();
                    
                    helpers.page_redirect(urls.current_url+'/admin');
                
                },
                
                datepicker_remove_error: function(e){
                    $(e.currentTarget).removeClass('error');
                }
                
				
                
		});
        
        return views;
        
	}
);