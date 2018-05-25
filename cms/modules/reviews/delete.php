<?php

/** Delete a review */

function deleteItems()
{
	global $message,$itemSelect;

	if (!empty($itemSelect)) {
		
		runQuery("UPDATE `review` 
			SET `status` = '".FLAG_DELETED."'
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected reviews have been moved to trash";
	
	} else {

		$message = "Please select a review from the list";

	}

}

?>