<?php

/** Save page rank */

function saveRank()
{
  global $message, $itemRank;
  
  if (!empty($itemRank)) {
    
    foreach ($itemRank as $reviewId => $reviewRank) {
      runQuery("UPDATE `review` 
        SET `rank` = '{$reviewRank}' 
        WHERE `id` = '{$reviewId}'");
    }

    $message = "Reviews ranking has been saved";
  
  } else {
    
    $message = "No reviews available.";
  
  }  
  
}

?>
