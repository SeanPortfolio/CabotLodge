<?php
/** Save redirect data */
function saveItem()
{
  global $message, $id, $do, $disableMenu;

  $arrTemporary = array();

  $arrTemporary['old_url']        = validateInput('old_url');
  $arrTemporary['new_url']        = validateInput('new_url');
  $arrTemporary['status_code']    = validateInput('status_code');

  updateRow($arrTemporary, 'redirect', "WHERE `id` = '{$id}'");

  $message = "Redirect has been saved";
}

