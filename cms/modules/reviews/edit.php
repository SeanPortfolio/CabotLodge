<?php

/** Edit review data */
function editItem() 
{

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action;

  $disableMenu = FLAG_YES; 

  $sqlReviews = "SELECT `person_name`, 
      `person_location`, 
      `description`, 
      `photo_path`,
      IF(`date_posted`, DATE_FORMAT(`date_posted`, '%d/%m/%Y'), '' )  AS posted_on
    FROM `review`
    WHERE `id` = '{$id}'
    LIMIT 1";

  $reviewData = fetchRow($sqlReviews);

  if (empty($reviewData)) {

    Helper::redirect(ADMIN_BASE_URL.DS.'?do='.$do);

  }

  /** define vars */

  $reviewId          = $reviewData['id'];
  $reviewPersonName  = $reviewData['person_name'];
  $reviewLocation    = $reviewData['person_location'];
  $reviewPhotoPath   = $reviewData['photo_path'];
  $reviewDescription = $reviewData['description'];
  $reviewDate        = $reviewData['posted_on'];
  

  $reviewLabel = ($reviewPersonName) 
      ? $reviewPersonName.(($reviewLocation) ? ", {$reviewLocation}" : '') 
      : 'Untitled';

  $moduleSubHeading = 'Editing Review: '.$reviewLabel;


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

  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Details']  = $tabDetailsContent;

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
