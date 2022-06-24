(function(){
   
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
		 var input2 = document.createElement('INPUT') ;
		 var input3 = document.createElement('INPUT') ;
         input.type = 'hidden';
		 input2.type = 'hidden';
		 input3.type = 'hidden';
         //change the name as needed –>
         input.name = 'htmlData';
		 input2.name = 'htmlTitle';
		 input3.name = 'htmlLink';
         //set the data
         input.value = editor.getData();
		 input2.value = $('#pagetitle').val();
		 input3.value = $('#beforetitle').val();
         //append the new input to the form
         theForm.appendChild( input );
		 theForm.appendChild( input2 );
		 theForm.appendChild( input3 );

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
         editor.ui.addButton( 'ServerPreview',
            {
               label : 'Preview',
               command : pluginName,
			   className : 'cke_button_preview'
            });
      }
   });
   
})();