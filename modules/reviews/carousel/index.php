<?php
/** Review to showcase in carousel format */

$sqlreviews ="SELECT r.`id`,
	    r.`person_name`,
	    r.`person_location`,
	    r.`photo_path`,
	    r.`description`,
	    r.`date_posted`,
	    r.`rank`
	FROM `review` r
	WHERE r.`status` = '".FLAG_ACTIVE."'
  ORDER BY RAND()
  LIMIT 3";

$arrReviews = fetchAll($sqlreviews);

if($arrReviews) {		

	foreach ($arrReviews as $review) {

		$reviewPersonName  = $review['person_name'];
		$reviewLocation    = $review['person_location'];
		$reviewDetail      = $review['description'];
    $reviewPhotoPath   = Helper::getFullUrl($review['photo_path']);
    
    $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');

    $reviewDetail = strTruncate($reviewDetail, 160, '...', true, false);
  
    $moreReviewsBtn   = ''; 
  
    if (!empty($impPageReviews)) {

      $moreReviewsUrl   = Helper::getFullUrl($impPageReviews->full_url);
      $moreReviewstitle = $impPageReviews->title;

      $moreReviewsBtn   = '<p>
          <a href="'.$moreReviewsUrl.'" title="'.$moreReviewstitle.'" class="btn">More Reviews</a>
        </p>';
    }
		
		$pageReviewsContent .='<blockquote class="review-item">
				<p class="review-content">'.$reviewDetail.'</p>
				<p class="review-person">'.$reviewPersonName.'</p>			
			</blockquote>';
	}
	
	$pageReviewsContent = '<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="reviews-carousel">
							'.$pageReviewsContent.'
            </div>
            '.$moreReviewsBtn.'
			 		</div>
			 	</div>
			</div>
    </section>';
    
  $templateTags['footer_review'] .= $pageReviewsContent;

}
?>