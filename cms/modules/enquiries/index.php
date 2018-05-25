<?php

/**
 * Manage Contact enquiries
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

  $moduleMainHeading  = 'Contact Enquiries';

  $itemSelect    = requestVar('item_select');
  $action        = requestVar('action');

  $activeRecords = "";
  $moduleContent = "";

  switch ($action) {
    case 'edit':
      require_once 'edit.php';
      $return = editItem();
      break;

    case 'delete':
      require_once 'delete.php';
      $return = deleteItems();
      break;
  }

 
   
  /** Include list file and generate page table */
  require_once 'list.php';

  $activeRecords = generateTable();
   
  if ($message != "") {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';
  }

  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'delete\')">
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>
      </li>
    </ul>';
  
  $moduleContent .= '<form  action="'.ADMIN_BASE_URL.DS.'index.php" 
    method="post" style="margin:0px;" name="pageList">
    <table width="100%" class="bordered">
      <thead>
        <tr>
            <th width="20">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall"><span></span>
              </label>
            </th>
            <th width="70">Enquiry ID</th>
            <th  width="200">Person Name</th>
            <th  width="200">Person Email</th>
            <th  width="150">Enquiry Date</th>
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
