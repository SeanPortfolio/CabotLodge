<?php

/** Edit an Item */

function editItem()
{

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action;

  $disableMenu = FLAG_YES; 

  $sqlBlogCategories = "SELECT bc.`id`, 
        bc.`page_meta_data_id`,
        pmd.`name`,
        pmd.`menu_label`,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`title`,
        pmd.`meta_description`,
        pmd.`og_title`,
        pmd.`og_meta_description`,
        pmd.`og_image`,
        pmd.`page_code_head_close`,
        pmd.`page_code_body_open`,
        pmd.`page_code_body_close`               
    FROM `blog_category` bc
    LEFT JOIN `page_meta_data` pmd
        ON(bc.`page_meta_data_id` = pmd.`id`)
    WHERE bc.`id` = '{$id}'
    LIMIT 1";

  $itemData = fetchRow($sqlBlogCategories);

  if (empty($itemData)) {

    Helper::redirect(ADMIN_BASE_URL."/?do={$do}");
  
  }

  /** Define vars */

  $itemId                  = $itemData['id'];
  $itemMetaDataId          = $itemData['page_meta_data_id'];
  $itemName                = $itemData['name'];
  $itemMenuLabel           = $itemData['menu_label'];
  $itemUrl                 = $itemData['url'];
  $itemFullUrl             = $itemData['full_url'];
  
  $itemTitle               = $itemData['title'];
  $itemMetaDescription     = $itemData['meta_description'];
  $itemOgTitle             = $itemData['og_title'];
  $itemOgMetaDescription   = $itemData['og_meta_description'];
  $itemOgPhotoPath         = $itemData['og_image'];

  $itemCodeHeadClose       = $itemData['page_code_head_close'];
  $itemCodeBodyOpen        = $itemData['page_code_body_open'];
  $itemCodeBodyClose       = $itemData['page_code_body_close'];

  $main_subheading = 'Editing Blog Category: '.$itemName;

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

  /** Settings tab content */
  require_once MOD_VIEWS_DIR.'/settings.php';

  /** Meta Tags tab content */
  require_once MOD_VIEWS_DIR.'/meta_tags.php';

  /** Developer content tab content */
  require_once MOD_VIEWS_DIR.'/developer_content.php';

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Settings']       = $tabSettingsContent;
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

  $moduleContent = '<form action="'.ADMIN_BASE_URL.DS.'?do='.$do.'" method="post" 
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

?>
