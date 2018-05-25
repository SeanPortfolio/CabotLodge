<?php
/** View Trashed a Items */

function viewTrash()
{
  global $moduleMainHeading, $do, $pageId, $activePages, $pageRank, $message, $itemSelect, $listType;

  $main_heading .= ' | Trash';

  /** Restore selected items */
  if (requestVar('action') === 'restore') {

    $itemSelect = requestVar('item_select');
    
    if (count($itemSelect) > 0) {

      $query = "UPDATE page_meta_data 
        SET `status` = '".FLAG_HIDDEN."', 
          `date_deleted` = NULL 
        WHERE id IN (".implode(', ', $itemSelect).")";
      
      runQuery($query);
      
      header('Location: '.ADMIN_BASE_URL.'/index.php?do='.$do);
      exit();

    } else {

      $message = 'Plese select a blog category from list';

    }

  }

  /** Include list file and generate table for deleted items*/
  require_once 'list.php';

  $listType    = FLAG_DELETED;
  $activeRecords = generateTable();

  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default"
          onclick="submitForm(\'restore\',1)">
          <i class="fa fa-history"></i> Restore
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Back
        </a>
      </li>
    </ul>';

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'&view=trash"
     method="post" style="margin:0px;" name="pageList" id="pageList">
      <table width="100%" class="bordered">
        <thead>
          <tr>
            <th width="20">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall">
                <span></span>
              </label>
            </th>
            <th>Blog Posts</th>
            <th width="100" align="left" style="font-size:12px;">Posted on</th>
            <th width="150" align="left" style="font-size:12px;">Deleted On</th>                      
            <th width="100" align="left" align="center">Status</th>
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