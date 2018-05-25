<?php 

$pageAccommodationContent = '';

if ($mainPageId == $impPageAccommodation->id) {
	// Show subpage
	if(!empty($segment1)){

		require_once 'single/index.php';

	// Show landing page
	} else{

		require_once 'list/index.php';

	}
}

?>