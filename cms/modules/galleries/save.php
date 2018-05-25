<?php

/** Save Item*/

function saveItem()
{
  global $message, $id, $disableMenu;

  $objPhotoGallery = new PhotoGroup($id);

  $photoArr = array(
    'ind'     => requestVar('pg_photo_ind'),
    'images'  => requestVar('pg_full_path'),
    'thumbs'  => requestVar('pg_thumb_path'),
    'rank'    => requestVar('pg_photo_rank'),
    'heading' => requestVar('pg_photo_caption_heading'),
    'caption' => requestVar('pg_photo_caption'),
    'videoUrl'=> requestVar('pg_photo_video_url'),
    'altText' => requestVar('pg_photo_alt')
  );
    
  $objPhotoGallery->setPhotosFromRawData($photoArr);

  $showOnGalleryPage = sanitizeInput('show_on_gallery_page');

  $objPhotoGallery->name              = sanitizeInput('label');
  $objPhotoGallery->menuLabel         = sanitizeInput('menu_label');
  $objPhotoGallery->type              = FLAG_GALLERY;
  $objPhotoGallery->showOnGalleryPage = ($showOnGalleryPage == FLAG_YES) 
                                        ? FLAG_YES 
                                        : FLAG_NO;
  $objPhotoGallery->showInCms         = FLAG_YES;
  $objPhotoGallery->createThumbs      = FLAG_YES;

  $objPhotoGallery->thumbWidth        = GALLERY_THUMB_WIDTH;
  $objPhotoGallery->thumbHeight       = GALLERY_THUMB_HEIGHT;

  $objPhotoGallery->save();
  
  $message = "Gallery has been saved";

}


?>