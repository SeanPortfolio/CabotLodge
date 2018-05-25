<?php

/** Save data */

function saveItem ()
{

  global $message, $do ,$id;

  $categoryId = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  $menuLabel  = validateInput('menu_label');

  $url  = (requestVar('url')) ? validateInput('url') : validateInput('name');
	$url  = Helper::url($url);

  $templateId = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId = (empty($templateId)) ? DEFAULT_TEMPLATE_ID: $templateId ;

  $arrMetaData['name']                 = validateInput('name');
	$arrMetaData['menu_label']           = $menuLabel;
  $arrMetaData['url']                  = $url;
  $arrMetaData['full_url']             = "/{$url}";
  $arrMetaData['title']                = validateInput('title');
	$arrMetaData['meta_description']     = validateInput('meta_description');
	$arrMetaData['og_title']             = validateInput('og_title');
	$arrMetaData['og_meta_description']  = validateInput('og_meta_description');
  $arrMetaData['og_image']             = (!empty(requestVar('og_image'))) ? validateInput('og_image') : null;
  
  $arrMetaData['page_code_head_close'] = requestVar('page_code_head_close');
  $arrMetaData['page_code_body_open']  = requestVar('page_code_body_open');
  $arrMetaData['page_code_body_close'] = requestVar('page_code_body_close');
  
  $arrMetaData['date_updated']         = Helper::getCurrentDateTimeStr();  
  $arrMetaData['updated_by']           = USER_ID;
  $arrMetaData['template_id']          = $templateId;

  updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}'");

  $message = "Blog category has been saved";

}

?>