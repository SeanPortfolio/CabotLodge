<?php
/** Publish Items */

function publishItems() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
          
    runQuery("UPDATE `page_meta_data` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected blog categories have been published";

	} else {

    $message = "Please select a blog category from the list";
    
	}

}

?>