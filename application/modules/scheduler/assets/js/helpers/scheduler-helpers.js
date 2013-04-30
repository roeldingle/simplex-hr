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
            
            
            /*to redirect
            *   sUrl = url of the page you want to redirect
            */
            page_redirect: function(sUrl){
                $(location).attr('href',sUrl);
            }
        
        }
	}
);