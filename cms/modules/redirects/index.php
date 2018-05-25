<?php

function initMain()
{

  global $message, $isValidSession, $itemSelect, $id, $moduleMainHeading, $do;

  $action     = requestVar('action');
  $itemSelect = requestVar('item_selected');

  $moduleMainHeading = 'Redirects';

  switch ($action) {

    case 'publish':
      require_once 'publish.php';
      $return = publishItems();
      break;

    case 'hide':
      require_once 'hide.php';
      $return = hideItems();
      break;

    case 'new':
      require_once 'new.php';
      $return = newItem();
      break;

    case 'delete':
      require_once 'delete.php';
      $return = deleteItems();
      break;

    case 'edit':
      require_once 'edit.php';
      $return = editItem();
      break;

    case 'save':
      require_once 'save.php';
      $return = saveItem();
      break;
  }

  $activeRecords = '';
  $moduleContent = '';
  
  /** Generate item table list */
  $sqlRedirects = "SELECT `id`, 
      `old_url`, 
      `status`, 
      `status_code`
    FROM `redirect`
    WHERE `status` != '".FLAG_DELETED."'
    ORDER BY `status`";

  $redirectList = fetchAll($sqlRedirects);

  foreach ($redirectList as $item) {

    $itemId         = $item['id'];
    $itemOldUrl     = $item['old_url'];
    $itemStatus     = $item['status'];
    $itemStatusCode = $item['status_code'];

    $itemStatusCode = ($itemStatusCode != 0) ? $itemStatusCode : '-';
    
    $itemLabel = ($itemOldUrl ) ? $itemOldUrl : 'No URL';

   /** Generate item table list */ if ($itemStatus == FLAG_ACTIVE) {
  
      $itemStatus = '<span class="label label-success">Published</span>';

    } elseif ($itemStatus == FLAG_HIDDEN) {

      $itemStatus = '<span class="label label-warning">Hidden</span>';

    } else {

      $itemStatus = '<span class="label label-danger">Deleted</span>';

    }

    $activeRecords .= '<tr>
          <td width="30" align="center">
            <label class="custom-check">
              <input type="checkbox" name="item_selected[]" class ="checkall" value="'.$itemId.'">
              <span></span>
            </label>
          </td>
          <td>'.$itemStatusCode.'</td>
          <td width="200">
            <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$itemLabel.'</a>
          </td>
          <td width="200">'.$itemStatus.'</td>
        </tr>';
  }

  /** Show message */
  if (!empty($message)) {

      $moduleContent .= '
          <div class="alert alert-warning page">
              <i class="glyphicon glyphicon-info-sign"></i>
              <strong>' . $message . '</strong>
          </div>
      ';

  }

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default"
         onclick="submitForm(\'new\',1)">
          <i class="glyphicon glyphicon-plus-sign"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'delete\')">
          <i class="glyphicon glyphicon-trash"></i> Delete
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'publish\')">
          <i class="glyphicon glyphicon-eye-open"></i> Publish
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'hide\')">
          <i class="glyphicon glyphicon-eye-close"></i> Hide
        </button>
      </li>
    </ul>';

  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'" method="post" style="margin:0;" name="pageList">
      <table width="100%" class="bordered">
        <thead>
          <tr>
            <th width="20" align="center">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall">
                <span></span>
              </label>
            </th>
            <th  width="100" align="left">Status Code</th>
            <th  width="700" align="left">Old URL</th>
            <th  width="100" align="left">Status</th>
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

