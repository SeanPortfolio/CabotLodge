<?php

$templateTags['body_cls'] .= ' stay-landing-page';

$accommodationQuery = fetchAll("SELECT a.`id`,
        a.`price`,
        a.`beds`,
        a.`guests`,
        a.`bathrooms`,
        pmd.`heading`,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`short_description`,
        pmd.`photo_path`,
        pmd.`thumb_photo_path`,
        pmd.`gallery_id`
    FROM `accommodation` a
    LEFT JOIN `page_meta_data` pmd
        ON(a.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`menu_label` != ''
    ORDER BY pmd.`rank`");

if ( !empty($accommodationQuery) ) {

    foreach ($accommodationQuery as $accommData) {
        $id               = $accommData['id'];
        $heading          = $accommData['heading'];
        $price            = $accommData['price'] ? number_format($accommData['price'],0,'.',',') : '';
        $thumbPhoto       = $accommData['thumb_photo_path'] ? $accommData['thumb_photo_path'] : '';
        $photoPath        = $accommData['photo_path'] ? $accommData['photo_path'] : '';
        $fullUrl          = Helper::getFullUrl( $impPageAccommodation->full_url.$accommData['full_url'] );
        $galleryId        = $accommData['gallery_id'];
        $beds             = $accommData['beds'] ? $accommData['beds'].' King size beds' : '';
        $guests           = $accommData['guests'] ? 'Maximum of '.$accommData['guests'].' people' : '';
        $bathrooms        = $accommData['bathrooms'] ? $accommData['bathrooms'].' showers' : '';
        $shortDescription = $accommData['short_description'] ? $accommData['short_description'].'..' : '';

        //Generate carousel for every accommodation
        if (!empty($galleryId)) {
            $galleryQuery = "SELECT `full_path`,
                    `thumb_path`,
                    `width`,
                    `height` 
                    FROM 
                    `photo`
                    WHERE 
                    `photo_group_id` = '$galleryId' 
                    ORDER BY rank ASC";
            
         $galleryResult = fetchAll($galleryQuery);
            
         if (!empty($galleryResult)) {
             $galleryItems = '';
             $itemIndex = 0;
             foreach ($galleryResult as $key => $row) {
                        $photo = BASE_URL.$row['thumb_path'];
            
                        $galleryItems .= '
                            <div class="item">
                                <span class="item__image zoom__in" style="background-image:url('.$photo.')"></span>
                            </div>';
            
             }
         }
            
         $galleryCarousel = '<div class="gallery gallery__carousel">
                                    '.$galleryItems.'
                                </div>';      
        }

        $pageAccommodationContent .= '<section class="stay-landing-section">
                                        <div class="container stay-landing--container">
                                          <div class="stay-landing--holder">
                                            <div class="col-xs-12 col-md-4 stay-landing--item">
                                                <div class="stay-landing--grunge">
                                                    <img src="'.$grungeSmallPath.'">
                                                </div>
                                                '.$galleryCarousel.'
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-center stay-landing--item well">
                                                <div class="intro">
                                                    <h3 class="stay-landing--label text-center">'.$heading.'</h3>
                                                    <p>'.$shortDescription.'</p>
                                                </div>
                                                <div class="stay-landing--button">
                                                    <a href="'.$htmlroot.$fullUrl.'" class="btn btn--brown-ghost 
                                                    text-uppercase">
                                                        Discover
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-center stay-landing--item well">
                                                <p class="stay-landing--price">
                                                    '.($price ? 'From NZD <span class="stay-landing--number">'.
                                                    $price.'</span>' : '').'
                                                </p>
                                                <p class="stay-landing--info">
                                                    <i class="glyphicons glyphicons-bed-alt"></i> '.$beds.'
                                                </p>
                                                <p class="stay-landing--info">
                                                <i class="fa fa-shower"></i> '.$bathrooms.'
                                                </p>
                                                <p class="stay-landing--info">
                                                <i class="glyphicons glyphicons-parents"></i> '.$guests.'
                                                </p>
                                            </div>
                                          </div>
                                    </div>
                                 </section>';
    }
}


$imagePath = GRAPHICS_DIR.'/sketch-lodge-2.png';
$stayImage = Helper::getFullUrl($imagePath);

$templateTags['mod_view'] .= '
<div class="main__content">
 <div class="container main__container">
   <div class="row main-content--wrapper text-left">
       <div class="main__content__inner">
         <div class="col-xs-12 col-md-6 main-content--wrapper-left-content">
           <h1 class="main__content__heading">
             '.$pageHeading.'
           </h1>
           <p class="main__content__intro">'.$pageIntroduction.'</p>
           <div class="text-left">'.$pageContent.'</div>
         </div>
         <div class="col-xs-12 col-md-6 main-content--wrapper-right-content">
             <img src="'.$stayImage.'" class="main-content--wrapper--image" />
         </div>
       </div>
   </div>
   </div> 
 </div>';

 $templateTags['mod_view'] .= $pageAccommodationContent;

?>
