<?php

/** Delete item data */

function deleteItem()
{
  global $message, $itemSelect;

  if (!empty($itemSelect)) {

    $objSlideShow   = new PhotoGroup();

    $sqlUpdate = "UPDATE `page_meta_data` 
      SET `slideshow_id` = NULL 
      WHERE `slideshow_id` IN(".implode(',', $itemSelect).")";

    runQuery($sqlUpdate);

    $objSlideShow->deletePhotoGroup = FLAG_YES;
    
    $objSlideShow->delete($itemSelect);

  } else {

    $message = "Please select a slideshow from the list";

  }
}

?>
