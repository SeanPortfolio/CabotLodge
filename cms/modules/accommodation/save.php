<?php

/** Save item data */

function saveItem()
{
  global $message, $do, $id;

  $itemId           = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  $menuLabel          = validateInput('menu_label');

  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  
  $newHeroThumbPath = Helper::createImageThumb($photoPath, THUMB_WIDTH, THUMB_HEIGHT, $thumbPhotoPath);
  
  $templateId       = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId       = (empty($templateId)) ? STAY_TEMPLATE_ID: $templateId ;

  $url  = (requestVar('url')) ? validateInput('url') : validateInput('name');
	$url  = Helper::url($url);

  $pageSlideshowId = validateInput('slideshow_id', FILTER_VALIDATE_INT);
  $pageGallertId   = validateInput('gallery_id', FILTER_VALIDATE_INT);
  
  /** Save Page Meta Data */

  $arrMetaData = array();

  $arrMetaData['name']                  = validateInput('name');
  $arrMetaData['menu_label']            = $menuLabel;
  $arrMetaData['heading']               = validateInput('heading');
  $arrMetaData['short_description']     = validateInput('short_description');
  $arrMetaData['photo_path']            = $photoPath;
  $arrMetaData['url']      							= "{$url}";
	$arrMetaData['full_url'] 							= "/{$url}";
  $arrMetaData['thumb_photo_path']      = getNullIfEmpty($newHeroThumbPath);

  $arrMetaData['title']                 = validateInput('title');
	$arrMetaData['meta_description']      = validateInput('meta_description');
	$arrMetaData['og_title']              = validateInput('og_title');
	$arrMetaData['og_meta_description']   = validateInput('og_meta_description');
	$arrMetaData['og_image']              = (!empty(requestVar('og_image'))) 
																					? validateInput('og_image')
                                          : $photoPath;
                            
  $arrMetaData['page_code_head_close']  = requestVar('page_code_head_close');
  $arrMetaData['page_code_body_open']  	= requestVar('page_code_body_open');
  $arrMetaData['page_code_body_close'] 	= requestVar('page_code_body_close');
                                        
  $arrMetaData['gallery_id']            = $pageGallertId;
  $arrMetaData['slideshow_id']          = $pageSlideshowId;
  
  $arrMetaData['date_updated']          = Helper::getCurrentDateTimeStr();
  $arrMetaData['updated_by']            = USER_ID;
  $arrMetaData['template_id']           = $templateId;    

  updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}'");

  /** Save accommodation data */
 
  $arrItemData   = array();

  $arrItemData['price']           = validateInput('price', FILTER_VALIDATE_FLOAT);
  $arrItemData['booking_id']      = validateInput('booking_id');
  $arrItemData['beds']            = validateInput('beds', FILTER_VALIDATE_INT);
  $arrItemData['guests']          = validateInput('guests', FILTER_VALIDATE_INT);
  $arrItemData['bathrooms']       = validateInput('bathrooms', FILTER_VALIDATE_INT);
  $arrItemData['floorplan_pdf']   = validateInput('floorplan_pdf');
  $arrItemData['features']        = validateInput('features');

  updateRow($arrItemData, 'accommodation', "WHERE id='{$id}'");

  /**
	 * Save page responsive content
	 * Check if content record exist for this page
	 * get all exisitng row belong to this page's content
	 */

	$existingRows = fetchValue("SELECT GROUP_CONCAT(`id`) 
  FROM `content_row` 
  WHERE `page_meta_data_id` = '{$metaDataId}'");

if ($existingRows) { 

  /** delete all columns */
  runQuery("DELETE FROM `content_column` 
    WHERE `content_row_id` IN({$existingRows})");

  /** delete all rows */
  runQuery("DELETE FROM `content_row` 
    WHERE `id` IN($existingRows)");
}


if (!empty(requestVar('row-index')) && $metaDataId) {

  /** save new content rows and columns */
  $rows      = requestVar('row-index');
  $rowsRanks = requestVar('row-rank');
  $totalRows = count($rows);

  if ($totalRows > 0) { 

    for ($i=0; $i < $totalRows; $i++) { 

      $rowData = array();

      $rowData['rank']              = ($rowsRanks[$i]);
      $rowData['page_meta_data_id'] = $metaDataId;

      $rowId = insertRow($rowData, 'content_row');

      if ($rowId) { 
        
        $columnsRank    = requestVar("content-{$rows[$i]}-rank");
        $columnsContent = requestVar("content-{$rows[$i]}-text");
        $columnsClass   = requestVar("content-{$rows[$i]}-class");

        $totalROwColumns = count($columnsContent);

        if ($totalROwColumns > 0) {

          for ($k=0; $k < $totalROwColumns; $k++) { 

            $columnData                   = array();
            
            $columnData['content']        = $columnsContent[$k];
            $columnData['css_class']      = $columnsClass[$k];
            $columnData['rank']           = $columnsRank[$k];
            $columnData['content_row_id'] = $rowId;

            insertRow($columnData, 'content_column');
          }
        }
      }
    }
  }
}

  $message = "Accommodation has been saved";

}

