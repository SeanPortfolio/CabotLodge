<?php

/** Hide Items */

function hideItems()
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {

    runQuery("UPDATE `page_meta_data` 
      SET `status` = '".FLAG_HIDDEN."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");
    
    $message = "Selected blog posts have been hidden";
  
  } else {

    $message = "Please select a blog post from the list";

  }
}

?>