<?php
/** Add a new Item */
function newItem()
{
  global $message, $id, $do;

  $arrTemporary['old_url'] = 'URL';
  $arrTemporary['status']  = FLAG_HIDDEN;

  $id = insertRow($arrTemporary, 'redirect');

  if (!empty($id)) {

    $message = "New redirect has been added and ready to edit";

    Helper::redirect(ADMIN_BASE_URL."/?do={$do}&action=edit&id={$id}");
  
  } else {

    Helper::redirect(ADMIN_BASE_URL.'/index.php?do='.$do);
  
  }
}
