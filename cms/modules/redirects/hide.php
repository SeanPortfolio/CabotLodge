<?php

/** Hide Items*/

function hideItems()
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {
   
    runQuery("UPDATE `redirect` 
      SET `status` = '".FLAG_HIDDEN."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");
    
    $message = "Selected redirects have been hidden";
  
  } else {
    
    $message = "Please select a redirect from the list";
  
  }

}
?>
