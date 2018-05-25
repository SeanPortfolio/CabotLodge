<?php

/** Add new general pages*/

function newItem()
{
	global $message, $id, $do;

	$now = Helper::getCurrentDateTimeStr();

	$arrTempMetaData = array();
	$arrTempMetaData['name']               = 'Untitled';
	$arrTempMetaData['url']                = $now;
	$arrTempMetaData['date_created']       = $now;
	$arrTempMetaData['date_updated']       = $now;
	$arrTempMetaData['created_by']         = USER_ID;
	$arrTempMetaData['status']             = FLAG_HIDDEN;
	$arrTempMetaData['page_meta_index_id'] = 1;
	$arrTempMetaData['template_id'] 		   = DEFAULT_TEMPLATE_ID;
	
	$newMetaDataId = insertRow($arrTempMetaData,'page_meta_data');

	if (!empty($newMetaDataId)) {

		$arrTempNewPage = array();

		$arrTempNewPage['parent_id']         = null;
		$arrTempNewPage['page_meta_data_id'] = $newMetaDataId;

		$id = insertRow($arrTempNewPage, 'general_pages');

		if (!empty($id)) {

			$message = "New page has been added and ready to edit";

			require_once 'edit.php';
			editItem();
		
		} else {

			Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
		
		}

	} else {

		Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
	
	}

        
}

?>