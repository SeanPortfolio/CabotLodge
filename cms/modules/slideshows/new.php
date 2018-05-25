<?php

/** Add new item */

function newItem()
{
	global $message, $id, $do;

	$objSlideShow   = new PhotoGroup();
	
	$objSlideShow->showInCms = 'Y';
	$objSlideShow->save();
	
	$id =  $objSlideShow->id;

	$message = "New slideshow has been added and ready to edit";
	
	Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
    
}

?>