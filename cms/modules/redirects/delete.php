<?php

/** Delete a review */

function deleteItems()
{
	global $message,$itemSelect;

	if (!empty($itemSelect)) {
		
		runQuery("UPDATE `redirect` 
			SET `status` = '".FLAG_DELETED."'
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected redirects have been deleted";
	
	} else {

		$message = "Please select a redirect from the list";

	}

}
?>

