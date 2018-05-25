<?php

/** Save Item*/

function saveItem()
{
  global $message, $id, $disableMenu;

  $objSlideShow = new PhotoGroup($id);

  $photoArr = array(
    'ind'     => requestVar('pss_photo_ind'),
    'images'  => requestVar('pss_full_path'),
    'rank'    => requestVar('pss_photo_rank'),
    'heading' => requestVar('pss_photo_caption_heading'),
    'caption' => requestVar('pss_photo_caption'),
    'altText' => requestVar('pss_photo_alt'),
    );

  $objSlideShow->setPhotosFromRawData($photoArr);

  $objSlideShow->name = getNullIfEmpty(sanitizeInput('label'));
  $objSlideShow->showInCms = FLAG_YES;
  
  $objSlideShow->save();
  
  $message = "Item has been saved";

}


?>