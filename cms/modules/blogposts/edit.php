<?php

/** Edit an Item */

function editItem()
{
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action;

  $disableMenu = FLAG_YES; 

  $sqlBlog = "SELECT bp.`id`,
        bp.`page_meta_data_id`,
        IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%d/%m/%Y'), '') AS posted_on,
        pmd.`heading`,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`introduction`,
        pmd.`short_description`,
        pmd.`description`,
        pmd.`photo_caption_heading`,
        pmd.`photo_caption`,
        pmd.`photo_path`,
        pmd.`thumb_photo_path`,
        pmd.`title`,
        pmd.`meta_description`,
        pmd.`og_title`,
        pmd.`og_meta_description`,
        pmd.`og_image`,
        pmd.`page_code_head_close`,
        pmd.`page_code_body_open`,
        pmd.`page_code_body_close`,
        pmd.`publish_on`,
        pmd.`hide_on`,
        pmd.`template_id`,
        pmd.`updated_by`,
        pmd.`page_meta_index_id`
    FROM `blog_post` bp
    LEFT JOIN `page_meta_data` pmd
        ON(bp.`page_meta_data_id` = pmd.`id`)
    WHERE bp.`id` = '{$id}'
    LIMIT 1";

  $itemData = fetchRow($sqlBlog);

  if (empty($itemData)) {

    Helper::redirect(ADMIN_BASE_URL.'/?do='.$do);

  }

  /** Define vars */
  $itemId                  = $itemData['id'];
  $itemMetaDataId          = $itemData['page_meta_data_id'];
  $itemHeading             = $itemData['heading'];
  $itemUrl                 = $itemData['url'];
  $itemFullUrl             = $itemData['full_url'];
  $itemIntroduction        = $itemData['introduction'];
  $itemShortDescription    = $itemData['short_description'];
  $itemDescription         = $itemData['description'];

  $itemPhotoCaptionHeading = $itemData['photo_caption_heading'];
  $itemPhotoCaption        = $itemData['photo_caption'];
  $itemPhotoPath           = $itemData['photo_path'];
  $itemPhotoThumbPath      = $itemData['thumb_photo_path'];
  
  $itemTitle               = $itemData['title'];
  $itemMetaDescription     = $itemData['meta_description'];
  $itemOgTitle             = $itemData['og_title'];
  $itemOgMetaDescription   = $itemData['og_meta_description'];
  $itemOgPhotoPath         = $itemData['og_image'];

  $itemCodeHeadClose       = $itemData['page_code_head_close'];
  $itemCodeBodyOpen        = $itemData['page_code_body_open'];
  $itemCodeBodyClose       = $itemData['page_code_body_close'];

  $itemPostedOn            = $itemData['posted_on'];
  $itemUpdatedBy           = $itemData['updated_by'];

  $itemHeading = (!empty($itemHeading)) ? $itemHeading : 'Untitled';

  $moduleSubHeading = 'Editing Blog Post: ' . $itemHeading;

  $moduleActions = '<ul class="page-action">
      <li><button type="button" class="btn btn-default" onclick="submitForm(\'save\',1)"><i class="glyphicon glyphicon-floppy-save"></i> Save</button></li>
      <li><a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'"><i class="glyphicon glyphicon-arrow-left"></i> Cancel</a>
      </li>
    </ul>';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';

  /** Meta tags tab content */
  require_once MOD_VIEWS_DIR.DS.'meta_tags.php';

  /** Developer content tab content */
  require_once MOD_VIEWS_DIR.DS.'developer_content.php';

  /** Description tab content */
  require_once MOD_VIEWS_DIR.DS.'description.php';
  
  /** blog categories tab content */
  require_once MOD_VIEWS_DIR.DS.'categories.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Details']        = $tabSettingsContent;
  $arrMenuTabs['Meta Tags']      = $tabMetaTagsContent;
  $arrMenuTabs['Template Codes'] = $tabDeveloperContent;
  $arrMenuTabs['Categories']     = $tabBlogCategoriesContent;
  $arrMenuTabs['Content']        = $tabDescriptionContent;


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

