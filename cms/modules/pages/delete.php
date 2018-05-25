<?php
/** Delete a page */

function deleteItems()
{
	global $message,$itemSelect;

	if (!empty($itemSelect)) {
		
		runQuery("UPDATE `page_meta_data` 
			SET `status` = '".FLAG_DELETED."', `date_deleted` = NOW() 
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected pages have been moved to trash";
	
	} else {

		$message = "Please select an item from the list";

	}

}

?>