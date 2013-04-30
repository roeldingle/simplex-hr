$(function(){

    Welcome.init_display();
    

});

var Welcome = {


    init_display:function(){
        
        Welcome.animate_up('.img_wrap',20);
        
        Welcome.animate_up('.menu_wrap',30);
        
    
    },
    
    
    /*animate fade in and up*/
    animate_up: function(selector,numpx){
        
        $(selector).animate({opacity: 1}, {queue: false, duration: 1000});
        $(selector).animate({ top: "-"+numpx+"px" }, 1000);
        
    }
            



}