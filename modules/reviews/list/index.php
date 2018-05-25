<?php
$templateTags['body_cls'] = ' review-page';

/** Show all active reviews */

$sqlreviews ="SELECT r.`id`,
	    r.`person_name`,
	    r.`person_location`,
	    r.`photo_path`,
	    r.`description`,
	    r.`date_posted`,
	    r.`rank`
	FROM `review` r
	WHERE r.`status` = '".FLAG_ACTIVE."'
	ORDER BY r.`rank`";

$arrReviews = fetchAll($sqlreviews);

if($arrReviews) {		

	foreach ($arrReviews as $review) {

		$reviewPersonName  = $review['person_name'];
		$reviewLocation    = $review['person_location'];
		$reviewDetail      = $review['description'];
    $reviewPhotoPath   = Helper::getFullUrl($review['photo_path']);
    
    $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');
		
		$pageReviewsContent .='<blockquote class="review-item">
				<p class="review-content">'.$reviewDetail.'</p>
				<p class="review-person">'.$reviewPersonName.'</p>			
			</blockquote>';
	}
	
	$pageReviewsContent = '<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="reviews-list">
							'.$pageReviewsContent.'
						</div>
			 		</div>
			 	</div>
			</div>
    </section>';
    
  $templateTags['mod_view'] .= $pageReviewsContent;

}

?>