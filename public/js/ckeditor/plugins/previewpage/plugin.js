/*(function(){
   
   var pluginName = 'serverpreview';

   var serverpreviewCmd =
   {
      modes : { wysiwyg:1, source:1 },
      canUndo : false,
      exec : function( editor )
      {
         var theForm = document.getElementById('serverPreviewForm') ;
         if (!theForm) {
            //it doesn't exist still, we create it here
            theForm = document.createElement('FORM') ;
            theForm.method = 'POST' ;
            theForm.name = 'serverPreviewForm' ;
            theForm.id=theForm.name ;
            theForm.style.display = 'none' ;

            theForm.action = editor.config.serverPreviewURL;

            //new window please
            theForm.target='_blank';
            document.body.appendChild( theForm );
         }

         //clear previous data
         theForm.innerHTML = '' ;
         //set the new content
         var input = document.createElement('INPUT') ;
         input.type = 'hidden';
         //change the name as needed –>
         input.name = 'htmlData' ;
         //set the data
         input.value = editor.getData();
         //append the new input to the form
         theForm.appendChild( input );

         //that's all, append additional fields as needed, or set the variables in the previewPath

         //send the data to the server
         theForm.submit();
      }
   }
   
   
   CKEDITOR.plugins.add( pluginName,
   {
      init : function( editor )
      {
         editor.addCommand( pluginName, serverpreviewCmd );
         editor.ui.addButton( 'serverpreview',
            {
               label : 'Preview',
               command : pluginName
            });
      }
   });
   
})();*/

CKEDITOR.plugins.add('serverpreview', {
	init: function(editor){
		var pluginName = 'serverpreview';
		editor.addCommand(pluginName,{
			exec : function(editor){
				$('#edithide').hide();
				$('#saveshow').text("Saving and making content live. Please wait");
				
				
				
				//$.post("http://localhost:8080/test/TestServlet", { name: "John", time: "2pm" } );
				
				
				
				var pageTitle = $('#pagetitle').val();
				var pageData = editor.getData();
				
				$('#saveshow').text("Successfully saved content and made new content 'live'");
				$('#edithide').show();
			},
			canUndo : true
		});
		editor.ui.addButton('Serverpreview', {
			label: 'serverpreview',
			command: pluginName,
			className : 'cke_button_save'
		});
	}
});