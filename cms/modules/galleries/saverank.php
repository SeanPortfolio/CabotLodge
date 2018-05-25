<?php

/** Save item rank */

function saveRank()
{
  global $message;

  $objPhotoGallery = new PhotoGroup();
  $objPhotoGallery->saveRank(requestVar('item_rank'));

  $message = "Item ranking has been saved";
}

?>
