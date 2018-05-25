<?php

$blogPageFullURL = $impPageBlog->full_url;

if($mainPageId == $impPageBlog->id) {

	require_once 'list/index.php';
	
	$templateTags['body_cls'] .= ' blog-page';

	require_once 'single/index.php';
}

require_once 'footer/index.php';

?>