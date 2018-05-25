<?php
/** Publish reviews */

function publishItems() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
          
    runQuery("UPDATE `review` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected reviews have been published";

	} else {

    $message = "Please select a review from the list";
    
	}

}

?>