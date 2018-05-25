<?php

/** Save page rank */

function saveRank()
{
  global $message, $pageRank, $pageId;
  
  for($i=0; $i <= count($pageId); $i++)
  {
    $arrTempPage['rank'] = $pageRank[$i];
    $wherePageId         = $pageId[$i];

    $end = "WHERE id = '$wherePageId'";
    
    updateRow($arrTempPage, 'page_meta_data', $end);
  }
  
  $message = "Page ranking has been saved";
}

?>
