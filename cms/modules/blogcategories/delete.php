<?php
/** Delete data */

function deleteItems()
{
	global $message, $itemSelect;

	if (!empty($itemSelect)) {
		
		runQuery("UPDATE `page_meta_data` 
			SET `status` = '".FLAG_DELETED."', `date_deleted` = NOW() 
			WHERE `id` IN(".implode(',', $itemSelect).")");

		$message = "Selected blog categories have been moved to trash";
	
	} else {
		
		$message = "Please select a blog category from the list";
	
	}

}

?>