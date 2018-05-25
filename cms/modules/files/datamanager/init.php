<?php

$extraStyles  .= '<link href="/'.ADMIN_DIR.'/css/elfinder/main.min.css" rel="stylesheet">';
$extraStyles  .= '<link href="/'.ADMIN_DIR.'/css/elfinder/theme.css" rel="stylesheet">';
$extraScripts .= '<script src="/'.ADMIN_DIR.'/js/elfinder/elfinder.min.js"></script>';

$moduleContent = '<div id="elfinder"></div>';

$tempPhoto = (isset($_GET['NetZone']) && $_GET['NetZone']) ? sanitizeOne($_GET['NetZone'], 'sqlsafe') : '';
$ckCall    = (isset($_GET['CKEditorFuncNum'])) ? sanitizeOne($_GET['CKEditorFuncNum'], 'sqlsafe') : '';

$galleryId = (isset($_GET['gtoken']) && $_GET['gtoken']) ? sanitizeOne($_GET['gtoken'], 'sqlsafe') : '';

if($tempPhoto || $ckCall || $ckCall == '0')
{
	$template = "templates/fullwidth.html";
}

$scriptsOnLoad = <<< JS

$(document).ready(function(){

	var elf = $('#elfinder').elfinder({
		url:'requests/service/connector',
		height:550,
		resizable:false,
		validName:'/^[^\s]$/',
		getFileCallback:function(imgData, file) {
			
			var url = imgData.url;

			var photoCall = '{$tempPhoto}',
			    ckCall    = '{$ckCall}';
			    gToken   = '{$galleryId}';
			
			if (photoCall) {
				var setValOf = window.opener.document.getElementById(photoCall);
				
				var wJQuery = window.opener.jQuery;

				if (typeof setValOf != 'undefined') {
					
					setValOf.value = url;

					
					if (typeof window.opener.setNewPhoto === 'function' && photoCall == 'tempPhoto') {
						window.opener.setNewPhoto();
						window.close();
					}else if(typeof window.opener.setNewGalleryPhoto === 'function' && photoCall == 'tempGalleryPhoto')
					{
						window.opener.setNewGalleryPhoto();
						window.close();
					}else if(typeof window.opener.setNewGalleryPhoto === 'function' && photoCall == 'tempGalleryPhoto') {
						window.opener.setNewGalleryPhoto();
						window.close();
					} else if(window.opener.Suite && photoCall == 'set-item-gallery-photo') {
						var suite = new window.opener.Suite({});
				
						if (gToken) {
							wJQuery(setValOf).attr('data-token', gToken);
						}

						suite.setPhoto();
						window.close();
					} else {
						window.close();
					}
					
				}

			}

			if (window.opener.CKEDITOR) {
							
				if (ckCall) {
					window.opener.CKEDITOR.tools.callFunction(ckCall, url);
	                window.close();
                }
			}

		},
	}).elfinder('instance');

});

JS;


?>