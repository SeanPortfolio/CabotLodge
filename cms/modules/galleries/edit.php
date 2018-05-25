<?php
## ----------------------------------------------------------------------------------------------------------------------
## Edit page
function editItem() {

  global $message, $id, $do, $disableMenu, 
		$moduleMainHeading, $moduleSubHeading;


  $objPhotoGallery = new PhotoGroup($id);

  $disableMenu = "true";

  if (empty($objPhotoGallery->id)) {

    Helper::redirect(ADMIN_BASE_URL.DS.'?do='.$do);
  
  }

  $name              = $objPhotoGallery->name;
  $menuLabel         = $objPhotoGallery->menuLabel;
  $type              = $objPhotoGallery->type;
  $showInCms         = $objPhotoGallery->showInCms;
  $showOnGalleryPage = $objPhotoGallery->showOnGalleryPage;
  $arrPhotos         = $objPhotoGallery->photos;

  $moduleSubHeading = 'Editing gallery: '.$name;

  /** Module actions */
	$moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.DS.'?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Cancel
        </a>
      </li>
    </ul>';
 
  /** Details tab view */
  require_once MOD_VIEWS_DIR.DS.'details.php';

	/** Photos tab view */
  require_once MOD_VIEWS_DIR.DS.'photos.php';

  /** Generate tab array */

	$arrMenuTabs = array();

	$arrMenuTabs['Details']  = $tabDetailsContent;
	$arrMenuTabs['Photos']   = $tabPhotosContent;

	$tabIndex   = 0;
	$tabList    = "";
	$tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

		$tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
		$tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
		$tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
		name="pageList" enctype="multipart/form-data">
			<div id="tabs">
				<ul>'.$tabList.'</ul>
				<div style="padding:10px;">'.$tabContent.'</div>
			</div>
			<input type="hidden" name="action" value="" id="action">
			<input type="hidden" name="do" value="'.$do.'">
			<input type="hidden" name="id" value="'.$id.'">
	</form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();


}

?>