<?php

/** Delete item data */

function deleteItem()
{
  global $message, $itemSelect;

  
  if (!empty($itemSelect)) {

    $objGallery   = new PhotoGroup();

    $sqlUpdate = "UPDATE `page_meta_data` 
      SET `gallery_id` = NULL 
      WHERE `gallery_id` IN(".implode(',', $itemSelect).")";

    runQuery($sqlUpdate);
    
    $objGallery->deletePhotoGroup = FLAG_YES;
    $objGallery->delete($itemSelect);

    $message = "Galleries has been deleted successfully.";

  } else {
      
    $message = "Please select a gallery from the list";

  }
}

?>
