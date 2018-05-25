<?php

$templateTags['body_cls'] .= ' stay-single-page';

$accommData = fetchRow("SELECT a.`id`,
        a.`price`,
        a.`beds`,
        a.`guests`,
        a.`bathrooms`,
        a.`features`,
        a.`floorplan_pdf`,
        a.`booking_id`,
        a.`page_meta_data_id`,
        pmd.`heading`,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`short_description`,
        pmd.`photo_path`,
        pmd.`thumb_photo_path`,
        pmd.`gallery_id`,
        pmd.`slideshow_id`,
        pmd.`page_code_head_close`,
		pmd.`page_code_body_open`,
		pmd.`page_code_body_close`
    FROM `accommodation` a
    LEFT JOIN `page_meta_data` pmd
        ON(a.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`url` = '".$segment1."'
    ORDER BY pmd.`rank`");

if ( !empty($accommData) ) {
    $id                = $accommData['id'];
    $content           = getPageContent($accommData['page_meta_data_id']);
    $heading           = $accommData['heading'];
    $price             = $accommData['price'] ? number_format($accommData['price'],0,'.',',') : '';
    $thumbPhoto        = $accommData['thumb_photo_path'] ? $accommData['thumb_photo_path'] : '';
    $photoPath         = $accommData['photo_path'] ? $accommData['photo_path'] : '';
    $fullUrl           = $accommData['full_url'];
    $galleryId         = $accommData['gallery_id'];
    $pageSlideshowId   = $accommData['slideshow_id']; 
    $booking_id        = $accommData['booking_id'];
    $beds              = $accommData['beds'] ? $accommData['beds'].' King size beds' : '';
    $guests            = $accommData['guests'] ? 'Maximum of '.$accommData['guests'].' people' : '';
    $bathrooms         = $accommData['bathrooms'] ? $accommData['bathrooms'].' showers' : '';
    $features          = html_entity_decode ($accommData['features']); 
    $shortDescription  = $accommData['short_description'] ? $accommData['short_description'].'..' : '';
    $floorplanPdf      = Helper::getFullUrl($accommData['floorplan_pdf']);
    $headClose         = $accommData['page_code_head_close'];
	$bodyOpen          = $accommData['page_code_body_open'];
	$bodyClose         = $accommData['page_code_body_close'];

        //Generate carousel for the accommodation
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

}

$bookingIdUrl = Helper::getFullUrl($impPageBookings->full_url .'?rcidlist='.$booking_id);

$templateTags['js_code_head_close']	 .= (!empty($headClose)) ? $headClose : '' ;
$templateTags['js_code_body_open']   .= (!empty($bodyOpen)) ? $bodyOpen : '' ;
$templateTags['js_code_body_close']  .= (!empty($bodyClose)) ? $bodyClose : '' ;

$templateTags['mod_view'] .= '
 <div class="main__content">
    <div class="container main__container">
        <div class="row main-content--wrapper text-left">
            <div class="main__content__inner">
                <div class="col-xs-12 col-md-6 main-content--wrapper-left-content">
                '.$galleryCarousel.'
                </div>
                <div class="col-xs-12 col-md-6 main-content--wrapper-right-content ">
                <h1 class="main__content__heading">
                    '.$heading.'
                </h1>
                <p class="stay-landing--price">
                    '.($price ? 'From NZD <span class="stay-landing--number">'.$price.'</span>' : '').'
                </p>
                <div>
                    <ul class="stay-landing__items">
                     <li class="stay-landing__item"><i class="glyphicons glyphicons-bed-alt"></i> '.$beds.'</li>
                     <li class="stay-landing__item"><i class="fa fa-shower"></i> '.$bathrooms.'</li>
                     <li class="stay-landing__item"><i class="glyphicons glyphicons-parents"></i> '.$guests.'</li>
                    </ul> 
                </div>
                <p class="main__content__intro">'.$shortDescription.'</p>
                <a href="'.$bookingIdUrl.'" class="btn btn--full-brown-ghost text-uppercase">
                    Book Now
                </a>
                </div>
            </div>
         </div>
    </div> 
 </div>
 <section class="stay-child-section">
    <div class="container stay-child--container stay-child--border">
        <div class="row text-center">
            <h2>Features &amp; Highlights</h2>
            <div class="text-left stay-child__features">
                '.$features.'     
            </div>                            
        </div>
    </div>
 </section>
 <section class="stay-child-section">
    <div class="container stay-child--container">
        <div class="row text-left">
            <div class="text-left stay-child__content">
            '.$content.'    
            </div>                             
        </div>
        <div class="row text-center">
            <a href="'.$floorplanPdf.'" target="_blank" class="btn btn--full-brown-ghost text-uppercase">
                Floor Plan
            </a>
        </div>
    </div>
 </section>
 <section class="stay-child-section">
    <div class="container stay-child--container stay-child--background">
        <div class="row text-center">
            <img src="'.$motiff.'" />
            <h2>Would you like to stay with us?</h2>
             <a href="'.$bookingIdUrl.'" class="btn btn--full-brown-ghost text-uppercase">
                Book Now
            </a>                      
        </div>
    </div>
 </section>
 ';

 $templateTags['mod_view'] .= $pageAccommodationContent;

?>
