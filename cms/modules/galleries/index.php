<?php

/**
 * Manage Galleries
 *
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

function initMain() 
{
  global $do, $id, $message, $itemSelect, $moduleMainHeading, $moduleSubHeading;

  $moduleMainHeading  = 'Galleries';

  $itemSelect    = requestVar('item_select');
  $action        = requestVar('action');

  switch ($action) {
    case 'edit':
      require_once 'edit.php';
      $return = editItem();
      break;

    case 'new':
      require_once 'new.php';
      $return = newItem();
      break;

    case 'save':
      require_once 'save.php';
      $return = saveItem();
      break;
    case 'saverank':
      require_once 'saverank.php';
      $return = saveRank();
      break;
    case 'delete':
      require_once 'delete.php';
      $return = deleteItem();
      break;
  }

  $activeRecords = "";
  $moduleContent = "";

  $arrWhere = array(
    'type' => FLAG_GALLERY,
    'show_in_cms' => FLAG_YES
  );

  $objGallery   = new PhotoGroup();
  
  $galleries = $objGallery->getAll($arrWhere);

  foreach ( $galleries as $gallery ) {

    $rowItemId    = $gallery['id'];
    $rowItemLabel = $gallery['name'];
    $rowItemRank  = $gallery['rank'];

    $showOnGalleryPage = ($gallery['show_on_gallery_page'] == FLAG_YES) 
                        ? '<span class="label label-success">Yes</span>' 
                        : '<span class="label label-default">No</span>';

    $itemSelect="";

    $activeRecords .= '<tr>
      <td width="20" align="center">
        <label class="custom-check">
          <input type="checkbox" name="item_select[]" class ="checkall"
           value="'.$rowItemId.'"><span></span></label>
      </td>
      <td>
        <input type="text" name="item_rank['.$rowItemId.']"
         value="'.$rowItemRank.'" class="input--rank">
        <a href="'.ADMIN_BASE_URL.DS.'index.php?do='.$do
              .'&action=edit&id='.$rowItemId.'">
              '.$rowItemLabel.'
          </a>
      </td>
      <td width="150" align="center">
        '.$showOnGalleryPage.'
      </td>
    </tr>';
  }

  
  if ($message != "") {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';
  }

  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'new\',1)">
            <i class="fa fa-camera-retro"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default"
         onclick="submitForm(\'saverank\', 1)">
          <i class="glyphicon glyphicon-sort-by-order"></i> Save Rank
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'delete\')">
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>
      </li>
    </ul>';
  
  $moduleContent .= '<form  action="'.ADMIN_BASE_URL.'/index.php" 
    method="post" style="margin:0px;" name="pageList">
    <table width="100%" class="bordered">
      <thead>
        <tr>
            <th width="20">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall"><span></span>
              </label>
            </th>
            <th>Name</th>
            <th>Show on Gallery Page</th>
        </tr>
      </thead>
      <tbody>
        '.$activeRecords.'
      </tbody>
    </table>
    <input type="hidden" name="action" value="" id="action">
    <input type="hidden" name="do" value="'.$do.'" id="do">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}

?>
