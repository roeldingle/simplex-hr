var site = {

   element_container : [],
   element_counter : 0,
   row : function(element){
      var rows = $(element);
      window.location = urls.current_url + "?row=" + rows.val() + "&page=1" + element.query_string;
   },message : function(){
       
   },close_dialog : function(element_obj,callback){
       element_obj.dialog('close');
       callback();
   },message : function(message,element,type){     
      var class_name = "";
      if(type==="success"){
         class_name = "core-message-success";
      }else if(type==="warning"){
         class_name = "core-message-warning";      
      }else if(type=="hide"){
         element.children().hide();
         return false;

      }else{
         return false;
      }
      if($.inArray(element.get(0),site.element_container)==-1){
         site.element_container.push(element.get(0));
         site.element_counter += 1;
         var message = '<div class="'+class_name+' core-message-container'+site.element_counter+'" ><span class="core-message-text'+site.element_counter+'">'+message+'</span><a class="core-message-close core-message-close-button'+site.element_counter+'" alt="'+site.element_counter+'" href="javascript:void(0);">x</a></div>';
         element.html(message).fadeIn();
         $(".core-message-close-button"+site.element_counter).live('click',function(){
            var e_counter = $(this).attr('alt');
            $(".core-message-container"+e_counter).hide();
         });
      }else{
         var k = 1;
         for(sa in site.element_container){
            if(site.element_container[sa]==element.get(0)){
               $(".core-message-container"+k).hide();
               $(".core-message-container"+k).removeClass('core-message-success');
               $(".core-message-container"+k).removeClass('core-message-warning');
               $(".core-message-container"+k).addClass(class_name).fadeIn();
               $(".core-message-text"+k).html(message);
            }
            k++;
         }
      }
   },class_ext : {
      "gif":"core-icons-pdf",
      "txt":"core-icons-text",
      "doc":"core-icons-word",
      "docx":"core-icons-word",
      "ppt":"core-icons-presentation",
      "pptx":"core-icons-presentation",
      "xls":"core-icons-excel",
      "xlsx":"core-icons-excel",
      "gif":"core-icons-image",
      "png":"core-icons-image",
      "jpg":"core-icons-image",
      "zip":"core-icons-zip",
      "tar":"core-icons-zip",
      "bz2":"core-icons-zip",
      "exe":"core-icons-simple"
  }
};