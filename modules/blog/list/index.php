<?php

$blogPostView         = '';
$blogContentView      = '';
$blogSidebarPanelView = '';
$blogPaginationView   = '';
$delimiter            = ',';

$pageMaxRows          = PAGE_MAX_ROWS;
$queryString          = 'page';
$currentPage          = (isset($_GET[$queryString])) ? $_GET[$queryString] : 1;
$isSingle             = false;

$segment1 = ${"option{$pageIndex}"};
$segment2 = ${"option".($pageIndex+1)};
$segment3 = ${"option".($pageIndex+2)};

$arrPostType = array('archive', 'author', 'post', 'category');

if (($segment1 && $segment2) && in_array( $segment1, $arrPostType)) {

	switch ($segment1) {

		case 'author':
			require_once 'author_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'category':
			require_once 'category_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'archive':
			require_once 'archive_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'post':
			require_once 'single_post.php'; 	// Index, Follow
		  break;
	}	

} else {
  
	require_once 'all_posts.php';
	
	// Index, Follow

}
/** Generate page view */
require_once 'generate_view.php';

require_once 'panels/posts.php';
require_once 'panels/archives.php';
require_once 'panels/category.php';

/** Generate page view */
$blogContentView = '<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					'.$blogPostView.'
					<div class="pagination__wrapper">
						'.$blogPaginationView.'
					</div>
				</div>
				<div class="col-xs-12 col-md-4 siderbar__wrapper">
					'.$blogSidebarPanelView.'
				</div>
			</div>
		</div>
	</section>';

$templateTags['mod_view']  .= $blogContentView;
?>