<?php

require_once __DIR__.'/../single/index.php';

$footerBlogPostView = '<div class="footer-blog-item">
<div class="footer-blog-item__content">
  <h3 class="footer-blog-item__heading">Our Stories</h3>
  <div class="footer-blog-item__summary">
    '.$blogSummary.'
  </div>
 <div class="footer-blog-item__btn">
   <a href="'.$impPageBlog->full_url.'" title="'.$blogTitle.'" class="btn btn btn--white-ghost text-uppercase">All Stories</a>
 </div>
</div>				
</div>';

$templateTags['footer_blog_post_view'] = $footerBlogPostView;

?>