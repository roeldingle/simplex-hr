jQuery(document).ready(function($){

   /*triggers*/
   $('.logout_link').click(function(){
    Site.logout_clicked();
   });
   
   $('#logout_confirm').live('click',function(){
    Site.page_redirect('/login/logout');
   });
   
   $('#logo').live('click',function(){
    Site.page_redirect(urls.base_url);
   });
   
   
   

   
   
});

var Site = {
    
    /*for logout*/
    logout_clicked: function(){
        
        /*html content for logout*/
        var shtmlcontent = '<p>Are you sure you want to logout and leave this page?</p>';
            shtmlcontent += '<a href="#" id="logout_confirm" class="btn btn_type_3 btn_space fr mt10 mb10" ><span>Logout</span></a>';
            
         /*ui dialog options*/
        var adialogbox_options = {
            scontainer : 'message',
            aoption : {
                title: 'Message',
                width:350,
                resizable: false,
                modal: true
            },
            scontent : shtmlcontent

        }
       
       Site.dialog_box(adialogbox_options);
        
                
    },
    
    /*popup dialogbox
    *   options.scontainer = dom selector for the dialog box
    *   options.aoption = ui dialog options
    *   options.scontent = content of the dialog box
    *
    * @message option is for small dialog usually use to display message ex.are you sure u want to delete these item(s)
    */
    dialog_box: function(options){
        if(options.scontainer == null){
           options.scontainer = '.popup_wrap';
            $(options.scontainer).remove();
            var sDialogBox = '<div class="popup_wrap" style="display:none;" />';
            $('body').append(sDialogBox);
        }else if(options.scontainer == 'message'){
            options.scontainer = '.mess_box';
            $(options.scontainer).remove();
            var sDialogBox = '<div class="mess_box" style="display:none;" />';
            $('body').append(sDialogBox);
        }
        
       $(options.scontainer).html(options.scontent);
       
       $(options.scontainer).dialog(options.aoption);
    
    },
    
    /*to redirect
    *   sUrl = url of the page you want to redirect
    */
    page_redirect: function(sUrl){
        $(location).attr('href',sUrl);
    }
        



}