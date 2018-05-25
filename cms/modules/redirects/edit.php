<?php

/** Edit Redirect data */

function editItem()
{

  global $message, $id, $do, $disableMenu, $isValidSession, $moduleSubHeading, $moduleMainHeading;

  $disableMenu = FLAG_YES; 

  $sqlRedirect = "SELECT `id`, 
    `old_url`, 
    `new_url`, 
    `status_code`
  FROM `redirect`
  WHERE `id` = '{$id}'
  LIMIT 1";

  $redirectData = fetchRow($sqlRedirect);

  if (empty($redirectData)) {

    Helper::redirect(ADMIN_BASE_URL.DS.'?do='.$do);

  }

  /** define vars */

  $redirectId         = $redirectData['id'];
  $redirectOldUrl     = $redirectData['old_url'];
  $redirectNewUrl     = $redirectData['new_url'];
  $redirectStatusCode = $redirectData['status_code'];


  $moduleMainHeading = 'Redirects';
  $moduleSubHeading  = 'Editing Redirect: '.$redirectOldUrl;

  $arrStatusCode = array(301, 302);

  $ddStatusCode = '';

  foreach ($arrStatusCode as $code) {

    $isOptionSel = ($code == $redirectStatusCode) ? ' selected="selected"' : '';
    
    $ddStatusCode .= '<option value="'.$code.'"'.$isOptionSel. '>' . $code . '</option>';
  }

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
  $tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td width="100"><label for="old_url">Old URL:</label></td>
        <td><input name="old_url" type="text" id="old_url" value="'.$redirectOldUrl.'" style="width:700px;"></td>
      </tr>
      <tr>
        <td width="100"><label for="new_url">New URL:</label></td>
        <td><input name="new_url" type="text" id="new_url" value="'.$redirectNewUrl.'" style="width:700px;"></td>
      </tr>
      <tr>
        <td width="100"><label for="status_code">Status code:</label></td>
        <td>
          <select name="status_code" id="status_code" style="width:100px;">
            <option value="">-- Select --</option>
            ' . $ddStatusCode . '
          </select>
        </td>
      </tr>
    </table>';

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
