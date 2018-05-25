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
    AND bp.`date_posted` != ''
  ORDER BY bp.`date_posted` DESC
  LIMIT 1");

if (!empty($arrBlogPostData)) {
  
  /** DEFINE PAGE VARS */
  
	$blogPageId         = $arrBlogPostData['id'];
	$blogPageUrl        = $arrBlogPostData['url'];
  $blogPageFullUrl    = $arrBlogPostData['fullURL'];
  $blogHeading        = $arrBlogPostData['heading'];
  $blogDetails        = $arrBlogPostData['description'];
  $blogTitle          = $arrBlogPostData['title'];
  $blogAuthorName     = $arrBlogPostData['authorName'];
  $blogDate           = $arrBlogPostData['postedOn'];
  $blogThumbPhotoPath = $arrBlogPostData['thumbPhotoPath'];
  $blogSummary        = strlen($blogDetails) > 200 ? substr($blogDetails,0,200)."..." : $blogDetails;

  $blogPageFullUrl = Helper::getFullUrl($blogPageFullURL.'/post'.$blogPageFullUrl);		
  $blogThumbPhotoPath = Helper::getFullUrl($blogThumbPhotoPath);		

  
}

?>