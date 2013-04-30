define([
		/*libraries*/
        'underscore','backbone','text',
        
        /*custom helpers*/
        'helpersPath/scheduler-helpers',
        
        /*template*/
        //'text!tmplsPath/tpl_employment_tb.html',
        

         /*model*/
        'modelsPath/scheduler-model'		
		], 
         
    function(
        /*libraries*/
        _,backbone,text,
        
        /*helper*/
        helpers,
        
        /*template*/
        //tpl_emp_tb,
        
        /*model*/
        model
        
        ){	
        /*****************/
        
        
        /******************/
        
        
        
        var model = new model.defAjax();
        
        var scheduler = {
            
            test: function(array){
                
                console.log(array);
            
            },
            natDays : [
              [1, 1, 'hol'],
              [1, 2, 'hol'],
              [12, 25, 'hol'],
              [12, 26, 'hol']
            ],
                    
            nationalDays: function (date) {
                for (i = 0; i < scheduler.natDays.length; i++) {
                  if (date.getMonth() == scheduler.natDays[i][0] - 1
                      && date.getDate() == scheduler.natDays[i][1]) {
                    return [false, scheduler.natDays[i][2] + '_day'];
                  }
                }
              return [true, ''];
            },
            
            noWeekendsOrHolidays: function (date) {
                var noWeekend = $.datepicker.noWeekends(date);
                if (noWeekend[0]) {
                    return scheduler.nationalDays(date);
                } else {
                    return noWeekend;
                }
            }
            
            
        
        }
        		
		var views =   Backbone.View.extend({
                
                /*set array data*/
                aEmpData : new Array,
                
                /*backbone selector*/
                el: "body",
                
                /*backbone events*/
				events: {
                   // 'click .ui-state-default' : 'test'
				},
                
                 /*on load function*/
                initialize:  function(){
                
                    this.init_display();
                    
                    
				},
                
                
                init_display: function(){
                
                    /*initialize inline date picker*/
                      $( "#datepicker" ).datepicker({
                          changeMonth: true,
                          changeYear: true,
                          beforeShowDay: scheduler.noWeekendsOrHolidays,
                          onSelect: function(dateText, inst) { scheduler.test(inst); }
                      });
                    
                    
                }
                
				
                
		});
        
        return views;
        
	}
);