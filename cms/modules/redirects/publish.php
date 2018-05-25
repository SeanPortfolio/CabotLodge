<?php
/** Publish items */

function publishItems() 
{
  global $message,$itemSelect;

	if (!empty($itemSelect)) {
          
    runQuery("UPDATE `redirect` 
      SET `status` = '".FLAG_ACTIVE."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");

    $message = "Selected redirects have been published";

	} else {

    $message = "Please select a redirect from the list";
    
	}

}

?>
