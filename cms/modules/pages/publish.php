<?php
/** Publish general_pages */

function publishItems() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
          
    runQuery("UPDATE `page_meta_data` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected pages have been published";

	} else {

    $message = "Please select an item from the list";
    
	}

}

?>