<?php

/** Hide Items*/

function hideItems()
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {
   
    runQuery("UPDATE `review` 
      SET `status` = '".FLAG_HIDDEN."' 
      WHERE `id` IN(".implode(',', $itemSelect).")");
    
    $message = "Selected reviews have been hidden";
  
  } else {
    
    $message = "Please select a review from the list";
  
  }

}
?>