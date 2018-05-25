<?php

/** Save general page data */

function saveItem ()
{

	global $id, $message, $do;

	$parentId           = validateInput('page_parentid', FILTER_VALIDATE_INT);
	$metaDataId         = validateInput('meta_data_id', FILTER_VALIDATE_INT);
	$menuLabel          = validateInput('menu_label');
	
	$photoPath          = validateInput('photo_path');
	$thumbPhotoPath     = validateInput('thumb_photo_path');
	$motifPath          = validateInput('motif_path');
	
	$newHeroThumbPath   = Helper::createImageThumb(
												$photoPath, 
												THUMB_WIDTH, 
												THUMB_HEIGHT, 
												$thumbPhotoPath);
	
	$templateId = sanitizeInput('template_id', FILTER_VALIDATE_INT);
	$templateId = (($id == 1) ? HOME_TEMPLATE_ID: ((!empty($templateId)) ?  $templateId: DEFAULT_TEMPLATE_ID)) ;

	$url  = (requestVar('url')) ? validateInput('url') : validateInput('name');
	$url  = Helper::url($url);

	$pageSlideshowId = validateInput('slideshow_id', FILTER_VALIDATE_INT);
	$pageGallertId   = validateInput('gallery_id', FILTER_VALIDATE_INT);
	$pageMetaIndexId = validateInput('page_mrobots', FILTER_VALIDATE_INT);
	
	/** SAVE PAGE META DATA */
	$arrMetaData = array();

	$arrMetaData['name']                  = validateInput('name');
	$arrMetaData['menu_label']            = $menuLabel;
	$arrMetaData['footer_menu']           = validateInput('footer_menu');
	
	$arrMetaData['heading']               = validateInput('heading');
	$arrMetaData['sub_heading']           = validateInput('sub_heading');
	$arrMetaData['url']      							= ($id != 1) ? "{$url}" : 'home';
	$arrMetaData['full_url'] 							= ($id != 1) ? "/{$url}": "/";
	$arrMetaData['introduction']          = validateInput('introduction');
	$arrMetaData['short_description']     = validateInput('short_description');
	
	$arrMetaData['photo_caption_heading'] = validateInput('photo_heading');
	$arrMetaData['photo_caption']         = validateInput('photo_caption');
	$arrMetaData['photo_path']            = $photoPath;
	$arrMetaData['thumb_photo_path']      = $newHeroThumbPath;
	$arrMetaData['motif_photo_path']      = $motifPath;

	$arrMetaData['video_id']              = validateInput('video_id');
	$arrMetaData['quicklink_heading']     = validateInput('ql_heading');
	$arrMetaData['quicklink_photo_path']  = validateInput('ql_photo_path');
	$arrMetaData['quicklink_button_text'] = validateInput('ql_button_text');
	$arrMetaData['quicklink_description'] = validateInput('ql_description');
	
	$arrMetaData['title']                 = validateInput('title');
	$arrMetaData['meta_description']      = validateInput('meta_description');
	$arrMetaData['og_title']              = validateInput('og_title');
	$arrMetaData['og_meta_description']   = validateInput('og_meta_description');
	$arrMetaData['og_image']              = (!empty(requestVar('og_image'))) 
																					? validateInput('og_image')
																					: $photoPath;
	
	$arrMetaData['page_code_head_close'] 	= requestVar('page_code_head_close');
	$arrMetaData['page_code_body_open']  	= requestVar('page_code_body_open');
	$arrMetaData['page_code_body_close'] 	= requestVar('page_code_body_close');
	
	$arrMetaData['date_updated'] 					= Helper::getCurrentDateTimeStr();
	$arrMetaData['updated_by']            = USER_ID;
	$arrMetaData['gallery_id']            = $pageGallertId;
	$arrMetaData['slideshow_id']          = $pageSlideshowId;
	$arrMetaData['template_id']           = $templateId;
	$arrMetaData['page_meta_index_id']    = $pageMetaIndexId;

	updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}'");
	
	/** SAVE PAGE DETAILS */

	$arrPageData = array();

	$arrPageData['parent_id'] 		= $parentId;

	updateRow($arrPageData, 'general_pages', "WHERE id='{$id}' LIMIT 1");

	if ($id != 1){
	    
		$pgFullUrl 		= Helper::buildPageUrl($id);
		
		if ($pgFullUrl){
			
			$arrPageData = array('full_url' => "/{$pgFullUrl}");

			updateRow($arrPageData, 'page_meta_data', "WHERE `id` = '{$metaDataId}'");

		}
	}
	

	/** save  quicklinks */

	runQuery("DELETE FROM `page_has_quicklink` WHERE `page_id` = '{$id}'");

	$primaryQuicklinks     = requestVar('quicklink_id');
	$primaryQuicklinksRank = requestVar('quicklink_rank');

	if (!empty($primaryQuicklinks)) { 

		for ($i=0; $i < count($primaryQuicklinks); $i++) { 

			$arrPrimaryQuicklinkData   = array();
		
			$primaryQuicklinkId     = $primaryQuicklinks[$i];
			$primary_quicklink_rank = $primaryQuicklinksRank[$primaryQuicklinkId];
			$primary_quicklink_rank = (!empty($primary_quicklink_rank)) 
															? $primary_quicklink_rank 
															: 0;

			$arrPrimaryQuicklinkData['page_id']           = $id;
			$arrPrimaryQuicklinkData['quicklink_page_id'] = $primaryQuicklinkId;
			$arrPrimaryQuicklinkData['type']              = 'P';
			$arrPrimaryQuicklinkData['rank']              = $primary_quicklink_rank;

			insertRow($arrPrimaryQuicklinkData, 'page_has_quicklink');


		}

	}

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

	/** save page modules */
	
	$moduleRank = requestVar('mp_rank');
	$moduleIds  = requestVar('mod_id');

	$sql = "DELETE mp.* 
		FROM `module_pages` mp
		LEFT JOIN `modules` m 
		 	ON (m.`mod_id` = mp.`mod_id`)
    WHERE mp.`page_id` = '{$id}'
			AND m.`mod_showincms`='".FLAG_YES."'";
			
	runQuery($sql);

	for ($i=0; $i <= count($moduleIds); $i++) {

		$arrModuleData = array();

		if ($moduleRank[$i] > 0) {

			$arrModuleData['page_id']       = $id;
			$arrModuleData['modpages_rank'] = $moduleRank[$i];
			$arrModuleData['mod_id']        = $moduleIds[$i];

			insertRow($arrModuleData, 'module_pages');
		}
	}
	
	$message = "Page has been saved";
}
?>