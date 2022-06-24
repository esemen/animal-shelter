/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    config.contentsCss  = ['/css/style.css','/css/custom-style.css', ];
	config.serverPreviewURL = 'pagepreview.php';
	config.extraPlugins = 'fileicon,highslide,autogrow,ajaxsave,serverpreview,placeholder,tableresize,stylesheetparser,docprops,MediaEmbed,wordcount';
	config.autoGrow_onStartup = true;
	config.entities = false;
    config.allowedContent = true;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
    config.extraAllowedContent = 'table(*)';
    config.filebrowserBrowseUrl = '/ckfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/ckfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/ckfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/ckfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/ckfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/ckfinder/upload.php?opener=ckeditor&type=flash';
};
