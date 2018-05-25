<?php

$pageReviewsContent = '';

if ($mainPageId == $impPageReviews->id) {
    
	require_once 'list/index.php';

} else {

  require_once 'single/index.php';
  
}

?>