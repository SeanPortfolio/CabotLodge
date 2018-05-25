<?php


function viewTrash()
{
  global $do, $id, $message, $itemSelect, $itemRank, $listType, $moduleMainHeading, $moduleSubHeading;

  $moduleMainHeading .= ' | Trash';
  
  $activePages = "";

    if(requestVar('action') === 'restore') {

      $itemSelect = requestVar('item_select');

      if (count($itemSelect) > 0) {

        $query = "UPDATE `review` 
          SET `status` = '".FLAG_HIDDEN."'
          WHERE id IN (".implode(', ', $itemSelect).")";
        
        runQuery($query);
        
        header('Location: '.ADMIN_BASE_URL.'/index.php?do='.$do);
        exit();

      } else {

        $message = 'Plese select a review from list';

      }
    }
    
  /** Include list file and generate page table for deleted pages*/
  require_once 'list.php';

  $listType    = FLAG_DELETED;
  $activePages = generateTable();

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

  
  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'&view=trash"
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
            <th align="left">Person\'s Name</th>
            <th align="left" width="150">Posted On</th>
            <th align="left" width="100">Status</th>
          </tr>
        </thead>
        <tbody>
            '.$activePages.'
        </tbody>
      </table>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}?>