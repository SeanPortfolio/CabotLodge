<?php

/** Show single review */
$sqlreview ="SELECT r.`id`,
    r.`person_name`,
    r.`person_location`,
    r.`photo_path`,
    r.`description`,
    r.`date_posted`,
    r.`rank`
  FROM `review` r
  WHERE r.`status` = '".FLAG_ACTIVE."'
  AND r.`description` != ''
  ORDER BY rank";
  
$arrReviews = fetchAll($sqlreview);

if(!empty($arrReviews)){

  foreach($arrReviews as $arrReview){

    $reviewPersonName  = $arrReview['person_name'];
    $reviewLocation    = $arrReview['person_location'];
    $reviewDetail      = $arrReview['description'];
    $reviewPhotoPath   = Helper::getFullUrl($arrReview['photo_path']);
    
    $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');

    $reviewDetail = strTruncate($reviewDetail, 160, '...', true, false);
    
    $moreReviewsBtn   = ''; 
  
    if (!empty($impPageReviews)) {

      $moreReviewsUrl   = Helper::getFullUrl($impPageReviews->full_url);
      $moreReviewstitle = $impPageReviews->title;

      $moreReviewsBtn   .= '<p>
          <a href="'.$moreReviewsUrl.'" title="'.$moreReviewstitle.'" class="btn btn--full-brown-ghost 
          text-uppercase">All Reviews</a>
        </p>';
    }

    $pageReviewsContent .= '
    <section class="review-section">
      <div class="container review-section__container">
          <div class="row text-center">
              <div class="col-xs-12 col-md-3">
                <img src="'.$reviewsPhotoPath.'" />
              </div>
              <div class="col-xs-12 col-md-9 text-left">
                <div class="review-item">
                  <i class="fa fa-quote-left"></i>
                  <p class="review-content">'.$reviewDetail.'</p>
                  <p class="review-person" style="display:none;">'.$reviewPersonName.'</p>
                  '.$moreReviewsBtn.'		
                </div>	
              </div>
          </div>
      </div>
    </section>
    ';
    
  }
  $pageReviewsContentWrapper = '
  <div class="review-item--slick">
    '.$pageReviewsContent.'
  </div>';
  
  $templateTags['footer_review']  = $pageReviewsContentWrapper;

}
?>