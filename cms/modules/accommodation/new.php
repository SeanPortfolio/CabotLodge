<?php
/** Add a new Item */

function newItem()
{
	global $message, $id, $do;
	
	$now = Helper::getCurrentDateTimeStr();

	$url = Helper::slug("untitled-{$now}");
	
	$arrMetaData = array();

	$arrMetaData['name']         = 'Untitled';
	$arrMetaData['heading']      = 'Untitled';
	$arrMetaData['date_created'] = $now;
	$arrMetaData['date_updated'] = $now;
	$arrMetaData['created_by']   = USER_ID;
	$arrMetaData['updated_by']   = USER_ID;
	$arrMetaData['status']       = FLAG_HIDDEN;
	$arrMetaData['template_id']  = STAY_TEMPLATE_ID;	

  $newMetaDataId = insertRow($arrMetaData, 'page_meta_data');

  if (!empty($newMetaDataId)) {

		$arrItemData = array();

		$arrItemData['page_meta_data_id']  = $newMetaDataId;

		$id = insertRow($arrItemData, 'accommodation');

		if (!empty($id)) {

			$message = "New accommodation has been added and ready to edit";

      Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
		
		} else {

			Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
		
		}

	} else {

		Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
	
  }
  
}

