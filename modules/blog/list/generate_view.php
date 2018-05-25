<?php

if (!empty($arrBlogPosts) && !$isSingle){
  
  /** Generate List view */
	foreach ($arrBlogPosts as $post) {

		$postHeading    = $post['heading'];
		$postDetails    = $post['details'];
		$postTitle      = $post['title'];
		$postAuthorName = $post['authorName'];
		$postDate       = $post['postedOn'];
		
		$ending        = '...';
		$postDetails   = nl2br($postDetails);
    
    $postHeading   = strTruncate($postHeading, 50, $ending, true, true);
    $postDetails   = strTruncate($postDetails, 100, $ending, true, true);
        
		$postPhotoPath = Helper::getFullUrl($post['thumbPhotoPath']);
		
		$postFullURL   = Helper::getFullUrl($blogPageFullURL.'/post/'.$post['url']);

		$postAuthorURL = Helper::getFullUrl($blogPageFullURL.'/author/'.$post['authorUrl']);
    
    $blogPostView .= '<div class="grid-row">
        <div class="grid-row__img"  title="'.$postTitle.'">
          <a href="'.$postFullURL.'" title="'.$postTitle.'" class="zoom__wrapper">
              <span style="background-image:url('.$postPhotoPath.')" class=""></span>
          </a>
        </div>
        <div class="grid-row__content">
          <h3 class="grid-row__heading">
            <a href="'.$postFullURL.'" title="'.$postTitle.'" class="grid-item__link">
              '.$postHeading.'
            </a>
          </h3>
          <p class="author">
            <i class="fa fa-clock-o"></i>Posted by 
            <a href="'.$postAuthorURL.'" class="grid-item__link">'.$postAuthorName.'</a> on '.$postDate.'
          </p>
          <p>'.$postDetails.'</p>
          <p class="grid-btn">
            <a href="'.$postFullURL.'" title="'.$postTitle.'" class="btn">Read More</a>
          </p>
        </div>				
    </div>';
	}
	
} else {

  /** Generate post details view */

	if (!empty($arrBlogPostData)) {

    $postHeading    = $arrBlogPostData['heading'];
		$postDetails    = $arrBlogPostData['description'];
		$postTitle      = $arrBlogPostData['title'];
		$postAuthorName = $arrBlogPostData['authorName'];
    $postDate       = $arrBlogPostData['postedOn'];
    $postAuthorURL = Helper::getFullUrl($blogPageFullURL.'/author/'.$arrBlogPostData['authorUrl']);

		$blogPostView .= '<div class="blog__content">
        '.$postDetails.'
        <p class="author">
          <i class="fa fa-clock-o"></i> Posted by 
          <a href="'.$postAuthorURL.'" class="grid-item__link">'.$postAuthorName.'</a> on '.$postDate.'
        </p>
			</div>';
  }
  
}

?>