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
	$arrMetaData['url']          = $url;
	$arrMetaData['full_url']     = "/{$url}";
	$arrMetaData['date_created'] = $now;
	$arrMetaData['date_updated'] = $now;
	$arrMetaData['created_by']   = USER_ID;
	$arrMetaData['updated_by']   = USER_ID;
	$arrMetaData['status']       = FLAG_HIDDEN;
	$arrMetaData['template_id']  = DEFAULT_TEMPLATE_ID;	

  $newMetaDataId = insertRow($arrMetaData, 'page_meta_data');

  if (!empty($newMetaDataId)) {

		$arrPageData = array();

		$arrPageData['page_meta_data_id']  = $newMetaDataId;

		$id = insertRow($arrPageData, 'blog_post');

		if (!empty($id)) {

			$message = "New blog has been added and ready to edit";

      Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
		
		} else {

			Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
		
		}

	} else {

		Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
	
  }
  
}

