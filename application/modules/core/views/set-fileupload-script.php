(function(){
   var mod = "<?php echo $modulename;?>";
   var unique = "<?php echo $uniqueflag_encrypt;?>";
   var total_upload = "<?php echo $total_upload;?>";
   var allowed = [<?php echo $allowed;?>];
   var li = "";   
      upclick({
         dataname : "core-filedata",
         element : $(".button-" + unique).get(0),
         action : urls.request_url + "u/" + mod,
         zindex:999999,
         action_params : {
            perform : "add",
            uploadname : "<?php echo $uploadname;?>-id",
            uname : "<?php echo $uploadname;?>",
            uniq : "<?php echo $uniqueflag_encrypt;?>"
         },onstart : function(filename){
            var new_filename =  filename.replace(/^.*[\\\/]/, '');
            var file_extension = new_filename.split('.').pop();

            $(".core-fileupload-error-message-"+unique).hide();
            $(".core-fileupload-message-loader-"+unique).hide();
            if(file_extension==""){
               $(".core-fileupload-error-message-"+unique).html("Invalid file").fadeIn();
               return false;
            }
            if($.inArray(file_extension,allowed)==-1){
                $(".core-fileupload-error-message-"+unique).html("Invalid file").fadeIn();
               return false;           
            }
            $(".core-fileupload-message-loader-"+unique).html("Attaching " + new_filename + "...").fadeIn();
         },oncomplete : function(response){
              if(response!==undefined){
               var j = jQuery.parseJSON(response); 
               if(j.status==="ok"){
                  var filename = j.filename;
                  var extension = j.extension; 
                  var class_type = (site.class_ext[extension]===undefined) ? "core-icons-default" : site.class_ext[extension];
                  li = '<li><span class="'+class_type+'"></span><span>'+filename+'</span><a href="javascript:void(0);" class="core-fileupload-remove-file-button-<?php echo $uniqueflag_encrypt;?>" alt="'+j.newname+'">X</a></li>';
                  $(".ul-"+unique).append(li);
                  $(".ul-"+unique+" li:last").effect("pulsate", { times:3 },500);
               }else if(j.status==="error"){
                  $(".core-fileupload-error-message-"+unique).html("Error in uploading file.").fadeIn();
               }else if(j.status==="invalid"){
                  $(".core-fileupload-error-message-"+unique).html("Invalid file extension.").fadeIn();
               }else if(j.status==="exceed"){
                  $(".core-fileupload-error-message-"+unique).html("File attachement has been execeeded.").fadeIn();
               }else{
                  $(".core-fileupload-error-message-"+unique).html("Sorry there is an error uploading your file.").fadeIn();
               }
            }
            $(".core-fileupload-message-loader-"+unique).hide();
         }
      });      
      $(".core-fileupload-remove-file-button-<?php echo $uniqueflag_encrypt;?>").live('click',function(){
         var file = $(this).attr('alt');
         var that = $(this);
         var options = {
            url : urls.request_url+"u/" + mod,
            type : "post",
            dataType : "json",
            data : {
               perform : "remove",
               uploadname : "<?php echo $uploadname;?>-id",
               uname : "<?php echo $uploadname;?>",               
               uniq : "<?php echo $uniqueflag_encrypt;?>",
               file : file
            },success : function(response){
               if(response!== undefined || response!==""){
                  if(response.status==="ok"){
                     that.parent().slideUp().remove();
                  }else{
                     $(".core-fileupload-error-message-"+unique).html(response.status).fadeIn();
                  }
               }
            }
         };
         $.ajax(options);
      });
})();