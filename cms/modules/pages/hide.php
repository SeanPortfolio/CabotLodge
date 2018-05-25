<?php

/** Hide general pages*/

function hideItems()
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {
    
    runQuery("UPDATE `page_meta_data` 
      SET `status` = '".FLAG_HIDDEN."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");
    
    $message = "Selected pages have been hidden";
  
  } else {

    $message = "Please select an item from the list";

  }

}
?>