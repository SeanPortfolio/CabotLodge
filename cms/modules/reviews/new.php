<?php

/** Add new general pages*/

function newItem()
{
	global $message, $id, $do;

	
  $arrTempData['person_name'] = 'Untitled';
  $arrTempData['status']      = FLAG_HIDDEN;

  $id = insertRow( $arrTempData, 'review' );

  $message = "New review has been added and ready to edit";

  if (!empty($id)) {
    
    require_once 'edit.php';
    editItem();
  
  } else {
    
    Helper::redirect(ADMIN_BASE_URL.DS.'index.php?do='.$do);
  
  }

        
}

?>