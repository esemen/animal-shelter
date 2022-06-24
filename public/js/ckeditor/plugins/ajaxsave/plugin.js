CKEDITOR.plugins.add('ajaxsave', {
	init: function(editor){
		var pluginName = 'ajaxsave';
		editor.addCommand(pluginName,{
			exec : function(editor){
				$('#edithide').hide();
				$('#saveshow').text("Saving preview. Please wait");
				
				var pageTitle = $('#pagetitle').val();
				var beforeTitle = $('#beforetitle').val();
				var pageData = editor.getData();
				
				var value = pageData.replace(/&nbsp;/gi, " ");
				value = value.replace(/&amp;/gi, "and");
				value = encodeURI(value);
				
				$.ajax({
					url: "admin_edit_query2.php",
					type: "POST",
					data: "option=save&pageid=" + pageid + "&pagecontent=" + value + "&pagename=" + encodeURI(pageTitle) + "&beforename=" + encodeURI(beforeTitle),
					success: function(data){
						if(data == '0'){
							$('#saveshow').text('Unknown Error');
						}else{
							var elem = $('#newslide').attr('href');
							var myregex = elem.match(/(.*)=/);
							$("#newslide").attr("href", myregex[0] + $('#pagetitle').val());

							$('#saveshow').text("Successfully saved preview content");
							
							window.location.href = "https://www.manytearsrescue.org/list_pages.php";
						}
						$('#edithide').show();				
					}
				});			
			},
			canUndo : true
		});
		editor.ui.addButton('Ajaxsave', {
			label: 'Save',
			command: pluginName,
			className : 'cke_button_save'
		});
	}
});