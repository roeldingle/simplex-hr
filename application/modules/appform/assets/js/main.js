define([
    /*libraries*/
    'underscore','backbone','text',
    
    /*view files*/
    'viewsPath/appform-views',
    'viewsPath/admin-views'
    
    ],
  function(_,backbone,text,view,admin_view){
		Backbone.emulateHTTP = true;
		Backbone.emulateJSON = true;
	
		var RouterStock = Backbone.Router.extend({
			routes: {
				"": "display"
			},
			display: function(){
                  var myjs_view = new view();
                  var myjs_adminview = new admin_view();
			}
		});
		
		/*initialize the route*/
		$(function(){
		    new RouterStock();
			Backbone.history.start();
           
		});
	}
);