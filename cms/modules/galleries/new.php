<?php

/** Add new item */

function newItem()
{

	global $message, $id, $do;

  $objGallery   = new PhotoGroup();
	
	$objGallery->type      = FLAG_GALLERY;
	$objGallery->showInCms =  FLAG_YES;

	$objGallery->save();
	
	$id      =  $objGallery->id;
	$message = "New gallery has been added and ready to edit";

	Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
    
}

?>