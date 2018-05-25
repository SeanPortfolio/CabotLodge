<?php

$galleryTabs   = '';
$galleryPhotos = '';

/** Get all galleries available to show on gallery page */
$arrWhere = array(
  'type' => FLAG_GALLERY,
  'show_on_gallery_page' => FLAG_YES
);

$objGallery   = new PhotoGroup();

$galleries = $objGallery->getAll($arrWhere);

if (!empty($galleries)) {

  foreach ($galleries as $gallery) {
    
    $galleryId       = $gallery['id'];
    $galleryHashedId = $gallery['hashedKey'];
    $galleryLabel = $gallery['menu_label'];

    /** Get all gallery Photos */

    $objPhotoGallery = new PhotoGroup($galleryId);
    
    $arrPhotos  = $objPhotoGallery->photos;
    
    if(!empty($arrPhotos)){
      
      /** Add gallery tab to filter navigation */
      $galleryTabs .= '<a class="shuffle-trigger btn gallery__filter__tab btn--brown-ghost"
         title="'.$galleryLabel.'" href="#"
         data-group="'.$galleryHashedId.'">'.$galleryLabel.'</a>';
      
      foreach($arrPhotos as $photo) {

        /** list gallery photos */

        $galleryPhotoFullPath  = Helper::getFullUrl($photo['fullPath']);
        $galleryPhotoThumbPath = Helper::getFullUrl($photo['thumbPath']);
        $galleryPhotoVideoId   = $photo['videoUrl'];
        $galleryPhotoCaption   = $photo['caption'];
        $galleryAltText        = $photo['altText'];
        $galleryPhotoGroupId   = $galleryId;
        $galleryPhotoGroupName = $galleryLabel;

        $lightBoxContentUrl = (!empty($galleryPhotoVideoId)) 
                            ? "https://www.youtube.com/watch?v={$galleryPhotoVideoId}" 
                            : $galleryPhotoFullPath;
        
        // $galleryPhotos .= '<figure class="col-xs-12 col-sm-4 col-md-3 gallery__items__inner--img shuffle-item swipebox img ps-item"  
        //   href="'.$lightBoxContentUrl.'" data-groups="all,'.$galleryHashedId.'" 
        //   title="'.$galleryPhotoCaption.'">
        //   <a href="'.$lightBoxContentUrl.'" class="gallery__figure">
        //       <span class="gallery__figure__inner">
        //         <span class="gallery__figure__img" style="background-image:url('.$galleryPhotoThumbPath.')"></span>
        //       </span>
        //     </a></figure>';
        $galleryPhotos .= '<figure class="col-xs-12 col-sm-4 col-md-3 gallery__items__inner--img shuffle-item swipebox img ps-item"  
          href="'.$lightBoxContentUrl.'" data-groups="all,'.$galleryHashedId.'" 
          title="asdad">
          <a href="'.$lightBoxContentUrl.'" class="gallery__figure">
              <span class="gallery__figure__inner">
                <span class="gallery__figure__img" style="background-image:url('.$galleryPhotoThumbPath.')"></span>
              </span>
            </a></figure>';
      }
    }
  }
}

if (!empty($galleryTabs) && !empty($galleryPhotos)) {
  
  /** Generate Gallery View */
  $pageGalleryView ='<section>
      <div class="container-fluid">
        <div class="row">      
          <div class="gallery">
            <nav class="gallery__filter">
              <a href="#" class="shuffle-trigger btn btn--ghost active gallery__filter__tab btn--brown-ghost" data-group="all">All</a>
              '.$galleryTabs.'
            </nav>
              <div class="gallery__items">
                <div class="gallery__items__inner shuffle" id="shuffle">
                  '.$galleryPhotos.'
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>';
}

?>