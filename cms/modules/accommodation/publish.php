<?php
/** Publish Items */

function publishItems()
{

	global $message, $itemSelect;

	if (!empty($itemSelect)) {
          
    runQuery("UPDATE `page_meta_data` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected flights have been published";

	} else {

    $message = "Please select a flight from the list";
    
	}

}

?>