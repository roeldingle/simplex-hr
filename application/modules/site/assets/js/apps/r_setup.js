(function() {
    "use strict";
	var siteModuleReq   = urls.assets_url + 'site';
    var myModuleReq     = urls.module_assets_url;
    var libsPath	    = siteModuleReq + '/js/libs';
	
    var appsPath	    = myModuleReq + 'js';
    var cssPath         = myModuleReq + 'css';
    var module_libsPath     = appsPath + '/module_libs';
	var modelsPath	    = appsPath + '/models';
	var viewsPath	    = appsPath + '/views';
	var tmplsPath	    = viewsPath + '/templates';
    var helpersPath	    = appsPath + '/helpers';

	requirejs.config({
		paths : {
			text: 			libsPath + '/text',
			underscore: 	libsPath + '/underscore',
			backbone: 		libsPath + '/backbone',
			appsPath:		appsPath,
			modelsPath:		modelsPath,
			viewsPath:		viewsPath,
			tmplsPath:		tmplsPath,
            helpersPath:	helpersPath,
            cssPath:        cssPath,
            siteModuleReq: siteModuleReq,
			module_libsPath: module_libsPath,
            myModuleReq: myModuleReq
		},
		baseUrl : '/',
		shim: {
			underscore: {
			  exports: '_'
			},
			backbone: {
				deps: ['underscore'],

				exports: 'Backbone'
			}
		}
	});

	require([
				'text',
				'appsPath/main'
			]
	);
})();