<?php

/** Delete a items */

function deleteItems()
{
	global $message,$itemSelect;

	if (!empty($itemSelect)) {
		
		runQuery("UPDATE `enquiry` 
			SET `status` = '".FLAG_DELETED."'
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected enquiries have been deleted";
	
	} else {

		$message = "Please select an enquiry from the list";

	}

}

?>