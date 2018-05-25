<?php

/** Edit an Item */

function editItem()
{
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action;

  $disableMenu = FLAG_YES; 

  $sqlItem = "SELECT a.`id`,
        a.`price`,
        a.`beds`,
        a.`guests`,
        a.`bathrooms`,
        a.`floorplan_pdf`,
        a.`features`,
        a.`booking_id`,
        a.`page_meta_data_id`,
        pmd.`name`,
        pmd.`menu_label`,
        pmd.`url`,
        pmd.`slideshow_id`, 
        pmd.`gallery_id`,
        pmd.`heading`,
        pmd.`short_description`,
        pmd.`description`,
        pmd.`photo_path`,
        pmd.`thumb_photo_path`,
        pmd.`title`,
        pmd.`meta_description`,
        pmd.`og_title`,
        pmd.`og_meta_description`,
        pmd.`og_image`,
        pmd.`page_code_head_close`,
        pmd.`page_code_body_open`,
        pmd.`page_code_body_close`
    FROM `accommodation` a
    LEFT JOIN `page_meta_data` pmd
        ON(a.`page_meta_data_id` = pmd.`id`)
    WHERE a.`id` = '{$id}'
    LIMIT 1";

  $itemData = fetchRow($sqlItem);

  if (empty($itemData)) {

    Helper::redirect(ADMIN_BASE_URL.'/?do='.$do);

  }

  /** Define vars */
  $itemId                  = $itemData['id'];
  $itemMetaDataId          = $itemData['page_meta_data_id'];
  $itemName                = $itemData['name'];
  $itemMenuLabel           = $itemData['menu_label']; 
  $itemUrl                 = $itemData['url']; 
  $itemHeading             = $itemData['heading'];
  $itemShortDescription    = $itemData['short_description'];
  $itemPhotoPath           = $itemData['photo_path'];
  $itemPhotoThumbPath      = $itemData['thumb_photo_path'];
  $itemSlideshowId         = $itemData['slideshow_id'];
  $itemGalleryId           = $itemData['gallery_id'];

  $pageTitle               = $itemData['title'];
  $pageMetaDescription     = $itemData['meta_description'];
  $pageOgTitle             = $itemData['og_title'];
  $pageOgMetaDescription   = $itemData['og_meta_description'];
  $pageOgPhotoPath         = $itemData['og_image'];

  $itemCodeHeadClose       = $itemData['page_code_head_close'];
  $itemCodeBodyOpen        = $itemData['page_code_body_open'];
  $itemCodeBodyClose       = $itemData['page_code_body_close'];

  $itemBookingId           = $itemData['booking_id']; 
  $itemPrice               = $itemData['price'];
  $itemBeds                = $itemData['beds'];
  $itemGuests              = $itemData['guests'];
  $itemBathrooms           = $itemData['bathrooms'];
  $itemFeatures            = $itemData['features'];
  $itemFloorPlanPdf        = $itemData['floorplan_pdf'];
  
  $itemLabel = ((!empty($itemName)) ? $itemName : ((!empty($itemHeading)) ? $itemHeading : 'Untitled-'.$itemId ));

  $moduleSubHeading = 'Editing Accommodation: ' . $itemLabel;

  $moduleActions = '<ul class="page-action">
      <li><button type="button" class="btn btn-default" onclick="submitForm(\'save\',1)"><i class="glyphicon glyphicon-floppy-save"></i> Save</button></li>
      <li><a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'"><i class="glyphicon glyphicon-arrow-left"></i> Cancel</a>
      </li>
    </ul>';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Features tab content */
  require_once MOD_VIEWS_DIR.DS.'features.php';

  /** Meta tags tab content */
  require_once MOD_VIEWS_DIR.DS.'meta_tags.php';

  /** Developer content tab content */
  require_once MOD_VIEWS_DIR.DS.'developer_content.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Details']        = $tabSettingsContent;
  $arrMenuTabs['Features']       = $tabFeaturesContent;
  $arrMenuTabs['Content']        = $tabContentContent;
  $arrMenuTabs['Meta Tags']      = $tabMetaContent;
  $arrMenuTabs['Template Codes'] = $tabDeveloperContent;

  $tabIndex   = 0;
	$tabList    = "";
	$tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

		$tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
		$tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
		$tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'" method="post" 
		name="pageList" enctype="multipart/form-data">
			<div id="tabs">
				<ul>'.$tabList.'</ul>
				'.$tabContent.'
			</div>
			<input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="hidden" name="meta_data_id" value="'.$itemMetaDataId.'">
	</form>';
    
  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

