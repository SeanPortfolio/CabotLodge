<?php
/** Save rank */

function saveRank()
{
  global $message, $itemRank;

  if (!empty($itemRank)) {
  
    foreach ($itemRank as $metaDataId => $categoryRank) {
      runQuery("UPDATE `page_meta_data` 
        SET `rank` = '{$categoryRank}' 
        WHERE `id` = '{$metaDataId}'");
    }

    $message = "Blog category ranking has been saved.";
  
  } else {
    
    $message = "Please enter ranking for blog categories.";
  
  } 
  
  $message = "Blog category ranking has been saved.";
}

?>
