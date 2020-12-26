+function ($) { "use strict";
    $(document).render(function() {
        if ($.FroalaEditor) {
			
			// кастомный фильтр
			// не делает "javascript%3A;" из ="javascript:;"
			var original_helpers = $.FE.MODULES.helpers; 
			$.FE.MODULES.helpers = function (editor) { 
				var helpers = original_helpers(editor); 
				// var isURL = helpers.isURL();  
				
				var original_sanitizeURL = helpers.sanitizeURL;
				helpers.sanitizeURL = function (url) { 
					//console.log('hello333 :)');				  
					if(url.match(/javascript\:;/gi)) 
						return url; 
				  
					return original_sanitizeURL(url); // use FE's original 
				}; 

				return helpers;
			}
						

			$.FroalaEditor.DEFAULTS = $.extend($.FroalaEditor.DEFAULTS, {
				htmlUntouched: true,
				htmlRemoveTags: [],
				enter: $.FroalaEditor.ENTER_BR,
				htmlAllowedAttrs: ['.*'],
				htmlAllowComments: true,
				imageAllowedTypes: ['jpeg', 'jpg', 'png', 'svg'],
				  paragraphFormat: {
					N: 'Normal',
					H1: 'Heading 1',
					H2: 'Heading 2',
					H3: 'Heading 3',
					H4: 'Heading 4',
					H5: 'Heading 5',
					H6: 'Heading 6',
					PRE: 'Code'
				  },
				  
				htmlAllowedEmptyTags: ['textarea', 'a', 'iframe', 'object', 'video', 'style', 'script', 'svg', 'use', 'span']
            });
        }        
    })
}(window.jQuery);