<?php
$arrBlogPostData = fetchRow("SELECT bp.`id`,
    pmd.`heading`,
    pmd.`url`, 
    pmd.`full_url` AS fullURL, 
    pmd.`photo_path`, 
    pmd.`thumb_photo_path` AS thumbPhotoPath,
    pmd.`thumb_portrait_photo_path`,
    pmd.`photo_caption_heading`,
    pmd.`photo_caption`, 
    pmd.`short_description`,
    pmd.`introduction`,
    pmd.`description`,
    pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`og_image`,
    pmd.`page_code_head_close`,
		pmd.`page_code_body_open`,
		pmd.`page_code_body_close`,
    IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%M %d, %Y'), '') AS postedOn,
    TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS authorName,
    REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') AS authorUrl
  FROM `blog_post` bp
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bp.`page_meta_data_id`)
  LEFT JOIN `cms_users` cu
    ON(cu.`user_id` = pmd.`updated_by`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`url` = '{$segment2}'
    AND bp.`date_posted` != ''
  ORDER BY bp.`date_posted` DESC
  LIMIT 1");

$isSingle = true;

if( !empty($arrBlogPostData) )
{
	
	// DEFINE PAGE VARS
	$blogPageId                   		   = $arrBlogPostData['id'];
	$blogPageUrl                   		   = $arrBlogPostData['url'];
	$blogPageFullUrl                	   = $arrBlogPostData['fullURL'];
	$blogCodeHeadClose                   = $arrBlogPostData['page_code_head_close'];
	$blogCodeBodyOpen                    = $arrBlogPostData['page_code_body_open'];
	$blogCodeBodyClose                   = $arrBlogPostData['page_code_body_close'];

	/* OVERRIDE PAGE VARS */
	$pagePhotoCaptionHeading             = $arrBlogPostData['photo_caption_heading'];
	$pagePhotoCaption                    = $arrBlogPostData['photo_caption'];
	$pagePhotoPath                       = $arrBlogPostData['photo_path'];
	$pageThumbPhotoPath                  = $arrBlogPostData['thumb_photo_path'];

	/** UPDATE TEMPLATE TAGS */
	$templateTags['heading']             = $arrBlogPostData['heading'];
	$templateTags['introduction']        = nl2br($arrBlogPostData['introduction']);
	$templateTags['title']               = $arrBlogPostData['title'];
	$templateTags['meta_description']    = $arrBlogPostData['meta_description'];
	$templateTags['og_title']            = $arrBlogPostData['og_title'];
	$templateTags['og_meta_description'] = $arrBlogPostData['og_meta_description'];
  $templateTags['og_image']            = Helper::getFullUrl($arrBlogPostData['og_image']);
  
  $templateTags['js_code_head_close']	 .= (!empty($blogCodeHeadClose)) ? $blogCodeHeadClose : '' ;
  $templateTags['js_code_body_open']   .= (!empty($blogCodeBodyOpen)) ? $blogCodeBodyOpen : '' ;
  $templateTags['js_code_body_close']  .= (!empty($blogCodeBodyClose)) ? $blogCodeBodyClose : '' ;

  /* CREATE PAGE CANONICAL TAGS */
  $postCanonicalTagURL = Helper::getFullUrl($blogPageFullURL.'/post'.$blogPageFullUrl);		
  $pageCanonicalTags   = '<link rel="canonical" href="'.$postCanonicalTagURL.'">';
  
  /** Update Page Meta Index for Robots */
	$pageMetaIndexId = 1; // NO INDEX, FOLLOW  
}
?>