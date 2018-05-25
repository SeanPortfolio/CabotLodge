<?php
/** Save rank */

function saveRank()
{
  global $message, $itemRank;

  if (!empty($itemRank)) {
  
    foreach ($itemRank as $metaDataId => $rank) {
      runQuery("UPDATE `page_meta_data` 
        SET `rank` = '{$rank}' 
        WHERE `id` = '{$metaDataId}'");
    }

    $message = "Accommodaton ranking has been saved.";
  
  } else {
    
    $message = "Please enter ranking for accommodation.";
  
  } 
  
  $message = "Accommodation ranking has been saved.";
}

?>
