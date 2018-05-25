<?php
/** Edit page data */
function editItem() 
{
  global $message, $id, $do, $disableMenu,
    $moduleSubHeading, $moduleMainHeading, $action;

  $messages = array(
      1 => 'Page heroshot is required'
  );

  $disableMenu = FLAG_YES; 

  $sqlPage = "SELECT gp.`id`,
      gp.`parent_id`,
      gp.`page_meta_data_id`,
      pmd.`name`,
      pmd.`menu_label`,
      pmd.`footer_menu`,
      pmd.`heading`,
      pmd.`sub_heading`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`introduction`,
      pmd.`short_description`,
      pmd.`description`,
      pmd.`photo_caption_heading`,
      pmd.`photo_caption`,
      pmd.`photo_path`,
      pmd.`thumb_photo_path`,
      pmd.`motif_photo_path`,
      pmd.`video_id`,
      pmd.`quicklink_heading`,
      pmd.`quicklink_photo_path`,
      pmd.`quicklink_description`,
      pmd.`quicklink_button_text`,
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
      pmd.`gallery_id`,
      pmd.`slideshow_id`,
      pmd.`template_id`,
      pmd.`page_meta_index_id`
  FROM `general_pages` gp
  LEFT JOIN `page_meta_data` pmd
      ON(gp.`page_meta_data_id` = pmd.`id`)
  WHERE gp.`id` = '{$id}'
  LIMIT 1";

  $pageData = fetchRow($sqlPage);
  
  if (empty($pageData)) {

    Helper::redirect(ADMIN_BASE_URL.'/?do='.$do);

  }

  /** define vars */

  $pageId                  = $pageData['id'];
  $pageParentId            = $pageData['parent_id'];
  $pageMetaDataId          = $pageData['page_meta_data_id'];
  $pageName                = $pageData['name'];
  $pageMenuLabel           = $pageData['menu_label'];
  $pageFooterMenu          = $pageData['footer_menu'];
  $pageHeading             = $pageData['heading'];
  $pageSubHeading          = $pageData['sub_heading'];
  $pageUrl                 = $pageData['url'];
  $pageFullUrl             = $pageData['full_url'];
  $pageIntroduction        = $pageData['introduction'];
  $pageShortDescription    = $pageData['short_description'];
  $pageDescription         = $pageData['description'];

  $pagePhotoCaptionHeading = $pageData['photo_caption_heading'];
  $pagePhotoCaption        = $pageData['photo_caption'];
  $pagePhotoPath           = $pageData['photo_path'];
  $pagePhotoThumbPath      = $pageData['thumb_photo_path'];
  $pageMotifPath           = $pageData['motif_photo_path'];
  $pageVideoId             = $pageData['video_id'];

  $pageQlHeading           = $pageData['quicklink_heading'];
  $pageQlPhotoPath         = $pageData['quicklink_photo_path'];
  $pageQlDescription       = $pageData['quicklink_description'];
  $pageQlButtonText        = $pageData['quicklink_button_text'];
  
  $pageTitle               = $pageData['title'];
  $pageMetaDescription     = $pageData['meta_description'];
  $pageOgTitle             = $pageData['og_title'];
  $pageOgMetaDescription   = $pageData['og_meta_description'];
  $pageOgPhotoPath         = $pageData['og_image'];

  $pageCodeHeadClose       = $pageData['page_code_head_close'];
  $pageCodeBodyOpen        = $pageData['page_code_body_open'];
  $pageCodeBodyClose       = $pageData['page_code_body_close'];

  $pageGalleryId           = $pageData['gallery_id'];
  $pageSlideshowId         = $pageData['slideshow_id'];
  $pageTemplateId          = $pageData['template_id'];
  $pageMetaIndexId         = $pageData['page_meta_index_id'];
  

  $moduleSubHeading = 'Editing page: '.$pageMenuLabel.'
      <a href="'.BASE_URL.$pageFullUrl.'" target="_blank">
       ('.BASE_URL.$pageFullUrl.'</a>)';

  
   /** Module actions */
	$moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Cancel
        </a>
      </li>
    </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.DS.'settings.php';

  /** Modules tab content */
  require_once MOD_VIEWS_DIR.DS.'modules.php';

  /** Privacy tab content */
  require_once MOD_VIEWS_DIR.DS.'privacy.php';

  /** Meta_tags tab content */
  require_once MOD_VIEWS_DIR.DS.'meta_tags.php';

  /** Developer content tab content */
  require_once MOD_VIEWS_DIR.DS.'developer_content.php';

  /** Quicklink_details tab content */
  require_once MOD_VIEWS_DIR.DS.'quicklink_details.php';

  /** Quicklinklist tab content */
  require_once MOD_VIEWS_DIR.DS.'quicklinklist.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Content']             = $tabContentContent;
  $arrMenuTabs['Modules']             = $tabModulesContent;
  $arrMenuTabs['Meta Tags']           = $tabMetaContent;
  $arrMenuTabs['Template Codes']      = $tabDeveloperContent;
  $arrMenuTabs['Privacy / SEO']       = $tabPrivacyContent;
  $arrMenuTabs['Settings']            = $tabSettingsContent;
  $arrMenuTabs['Quicklink Details']   = $tabQuicklinksContent;
  $arrMenuTabs['Choose Quicklinks']   = $tabQuicklinkListContent;

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
      <input type="hidden" name="meta_data_id" value="'.$pageMetaDataId.'">
	</form>';

  $extraStyles = '<style>
      .md-row{
          margin:10px 0;
      }
    </style>';
    
  require "resultPage.php";
  echo $resultPageContent;
  exit();
}
?>