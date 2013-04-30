define([
		/*libraries*/
        'underscore','backbone','text',
        
        /*custom helpers***********************************************************************************/
        'helpersPath/admin-helpers',
        
        /*template*/
        'text!tmplsPath/tpl_table_row.html',
        'text!tmplsPath/tpl_application_view.html',
        'text!tmplsPath/tpl_refferal_view.html',
        'text!tmplsPath/tpl_admin_message.html',

         /*model*/
        'modelsPath/admin-model'		
		], 
         
    function(
        /*libraries*/
        _,backbone,text,
        
        /*helper*/
        helpers,/*here*****************************************************************************************/
        
        /*template*/
        tpl_table_row,
        tpl_application_view,
        tpl_refferal_view,
        tpl_message,
        
        /*model*/
        model
        
        ){	
        
        var model = new model.defAjax();
        
        		
		var views =   Backbone.View.extend({
                
                /*backbone selector*/
                el: "body",
                
                /*backbone events*/
				events: {
                    "click .view_application" : "view_application",
                    "click .referral_view" : "view_refferal",
                    "click .search_btn" : "search_btn_clicked",
                    
                    "click #print_page" : helpers.print_page,
                    "mouseover #applicant_list tr" : "choosen",
                    "mouseover body" : "unchoose",
                    "click #applicant_list tr" : "click_choose",
                    "click .check_all" : "check_all",
                    "click .delete_btn" : "delete_clicked",
                    "click #delete_rows" : "delete_from_list",
                    "click #delete_success" : "delete_successfull"
                    
                    
				},
                
                 /*on load function*/
                initialize:  function(){
				    _.bindAll(this, 'render');
                    this.render();
				},

				render:  function(){
                    $("#applicant_list").tablesorter({
                        headers: {
                            0: { sorter: false },
                            4: { sorter: false }
                        }
                     });
                     
                     /*date pickers*/   
                    helpers.datepicker("#period_from");  
                    helpers.datepicker("#period_to");  
				},
                
                search_btn_clicked: function(){
                    console.log('here');
                
                },
                
                
                
                
                /*here  sample*********************************************************/
                view_application: function(e){
                    
                    var formdata    = {
                        url : urls.ajax_url,
                        mod : "appform|admin_api|get_application",
                        aa_idx: $(e.currentTarget).attr('id')
                        
                    }
                
                    helpers.ajax(model,formdata).success(function(response){ /*here*************************************/
                    
                        /*ajax response checker*/
                        if(jQuery.isEmptyObject(response) == false){
                          
                          /*display dialog box*/
                           var adialogbox_options = {
                                scontainer : null,
                                aoption : {
                                    title: 'Application view',
                                    width:1050,
                                    height: 700,
                                    resizable: false,
                                    //modal: true,
                                    buttons: [{ 
                                        text: "Print",
                                        id: 'print_page'
                                    }]
                                },
                                scontent : _.template(tpl_application_view, {rows: response}) /*parsed template*/
                            }
                            helpers.dialog(adialogbox_options);
                          
                          
                        }else{
                            console.log('error');
                        }
                        
                    });
                    
                },
                /*here  sample*********************************************************/
                
                
                
                
                
                view_refferal: function(e){
                
                    var iAppId = $(e.currentTarget).attr('alt');
                    
                    var formdata    = {
                        url : urls.ajax_url,
                        mod : "appform|admin_api|view_refferal",
                        aa_idx: iAppId
                    }
                    
                    helpers.ajax(model,formdata).success(function(response){
                    /*ajax response checker*/
                        if(jQuery.isEmptyObject(response) == false){
                          //console.log(response);
                           var adialogbox_options = {
                                scontainer : null,
                                aoption : {
                                    title: 'Referral view',
                                    width:1000,
                                    height: 500,
                                    resizable: false,
                                    //modal: true,
                                    buttons: [{ 
                                        text: "Print",
                                        id: 'print_page'
                                    }]
                                },
                                scontent : _.template(tpl_refferal_view, {rows: response}) /*parsed template*/

                            }
                            helpers.dialog(adialogbox_options);
                          
                        }else{
                            console.log('error');
                        }
                     });
                        
                
                },
                choosen: function(e){
                    this.unchoose();
                    $(e.currentTarget).children('td').addClass('choosen');
                },
                
                unchoose: function(){
                    $('#applicant_list tr td').removeClass('choosen');
                },
                click_choose: function(e){
                    $('#applicant_list tr td').removeClass('choosen_one');
                    $(e.currentTarget).children('td').addClass('choosen_one');
                },
                /*check all*/
                check_all: function(e){
                
                    if($(e.currentTarget).attr('checked')) {
                        $("input[type='checkbox']").attr('checked',true);
                    } else {
                        $("input[type='checkbox']").attr('checked',false);
                    }
                },
                
                delete_clicked: function(){
                
                    if ($('input:checkbox:checked').length > 0){ 
                        var adialogbox_options = {
                            scontainer : null,
                            aoption : {
                                title: 'Message',
                                width:300,
                                resizable: false,
                                modal: true
                            },
                            scontent : _.template(tpl_message,{message: 1})

                        }
                        helpers.dialog(adialogbox_options);
                    
                            
                    }else{
                        var adialogbox_options = {
                            scontainer : null,
                            aoption : {
                                title: 'Message',
                                width:300,
                                resizable: false,
                                modal: true
                            },
                            scontent : _.template(tpl_message,{message: 0})

                        }
                        helpers.dialog(adialogbox_options);
                    }
                },
                
                delete_from_list: function(){
                
                    var iAppId = new Array;//$('input[name="aa_idx[]"]').attr('id');
                    
                    var iAppId = new Array();
                    $('#applicant_list input:checked').each(function() {
                        iAppId.push($(this).attr('id'));
                    });
                   
                   
                    
                    var formdata    = {
                        url : urls.ajax_url,
                        mod : "appform|admin_api|delete_from_list",
                        aa_idx: iAppId
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
                
                delete_successfull: function(){
                    helpers.page_redirect(urls.current_url);
                }
                
		});
        
        return views;
        
	}
);