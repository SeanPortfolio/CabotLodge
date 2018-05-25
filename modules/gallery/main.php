<?php

$pageGalleryView = '';

if ($mainPageId == $impPageGallery->id) {
	
	$templateTags['body_cls'] .= ' gallery-page';

	require_once 'list/index.php';

} else {

	require_once 'carousel/index.php';
	
}

$templateTags['mod_view'] .= $pageGalleryView;

?>