<?php

/** Save item data */

function saveItem()
{
  global $message, $do, $id;

  $blogPostId       = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  $author           = validateInput('author', FILTER_SANITIZE_NUMBER_INT);
  
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  
  $newHeroThumbPath = Helper::createImageThumb($photoPath, THUMB_WIDTH, THUMB_HEIGHT, $thumbPhotoPath);
  
  $url              = (requestVar('url')) ? sanitizeInput('url') : sanitizeInput('name');
  $url              = Helper::url($url);
  
  $templateId       = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId       = (empty($templateId)) ? DEFAULT_TEMPLATE_ID: $templateId ;


  /** Save Page Meta Data */

  $arrMetaData = array();

  $arrMetaData['name']                  = validateInput('heading');
  $arrMetaData['heading']               = validateInput('heading');
  $arrMetaData['url']                   = $url;
  $arrMetaData['full_url']              = "/{$url}";
  $arrMetaData['introduction']          = validateInput('introduction');   
  $arrMetaData['short_description']     = validateInput('short_description');
  $arrMetaData['description']           = requestVar('description');
  
  $arrMetaData['photo_caption_heading'] = validateInput('photo_caption_heading');
  $arrMetaData['photo_caption']         = validateInput('photo_caption');
  $arrMetaData['photo_path']            = $photoPath;
  $arrMetaData['thumb_photo_path']      = getNullIfEmpty($newHeroThumbPath);
  
  $arrMetaData['title']                 = validateInput('title');
  $arrMetaData['meta_description']      = validateInput('meta_description');
  $arrMetaData['og_title']              = validateInput('og_title');
  $arrMetaData['og_meta_description']   = validateInput('og_meta_description');
  $arrMetaData['og_image']              = (!empty(requestVar('og_image'))) ? sanitizeInput('og_image'): $photoPath;

  $arrMetaData['page_code_head_close']  = requestVar('page_code_head_close');
  $arrMetaData['page_code_body_open']  	= requestVar('page_code_body_open');
  $arrMetaData['page_code_body_close'] 	= requestVar('page_code_body_close');

  $arrMetaData['date_updated']          = Helper::getCurrentDateTimeStr();
  
  $arrMetaData['updated_by']            = ($author) ? $author : USER_ID;
  $arrMetaData['template_id']           = $templateId;    

  updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}'");

  /** Save post data */

  $postedDate = validateInput('posted_on');
  $postedDate = (validateDate( $postedDate, 'd/m/Y' )) ? Helper::formateDate($postedDate) : null;

  $arrItemData = array();

  $arrItemData['date_posted']        = $postedDate;

  updateRow($arrItemData, 'blog_post', "WHERE id='{$blogPostId}'");

  /** Attach Categories Data */
  
  $attCategoryIds = requestVar('category_id');

  /** Delete Categories Data */
  runQuery("DELETE FROM `blog_post_has_category` WHERE `post_id` = '{$blogPostId}'");

  if(!empty($attCategoryIds)) {

    $insQuery = '';

    foreach ($attCategoryIds as $categoryId) { 

      $insQuery .= ',('.$blogPostId.','.$categoryId.')';
    }

    $insQuery = ltrim($insQuery, ',');

    if ($insQuery) {

      runQuery("INSERT INTO `blog_post_has_category`(`post_id`, `category_id`) VALUES {$insQuery}");

    }

  }
}

