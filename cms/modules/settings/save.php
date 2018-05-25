<?php 

function saveItem()
{
  global  $message, $id, $do, $disableMenu;

  $id = validateInput('id', FILTER_VALIDATE_INT);

  if (!empty($id)) {

    $arrSettings = array();

    $arrSettings['company_name']         = validateInput('company_name');
    $arrSettings['start_year']           = validateInput('start_year', FILTER_VALIDATE_INT);
    $arrSettings['email_address']        = validateInput('email_address');
    $arrSettings['phone_number']         = validateInput('phone_number');
    $arrSettings['address']              = validateInput('address');
    $arrSettings['slideshow_speed']      = validateInput('slideshow_speed', FILTER_VALIDATE_INT);
    
    $arrSettings['booking_id']           = validateInput('booking_id');
    $arrSettings['booking_url']          = validateInput('booking_url', FILTER_VALIDATE_URL);

    $arrSettings['js_code_head_close']   = requestVar('js_code_head_close');
    $arrSettings['js_code_body_open']    = requestVar('js_code_body_open');
    $arrSettings['js_code_body_close']   = requestVar('js_code_body_close');
    $arrSettings['adwords_code']         = requestVar('adwords_code');

    $arrSettings['robot_meta_tag']       = (sanitizeInput('robot_meta_tag') == FLAG_YES) ? FLAG_YES: FLAG_NO;

    $arrSettings['mailchimp_api_key']    = validateInput('mailchimp_api_key');
    $arrSettings['mailchimp_list_id']    = validateInput('mailchimp_list_id');

    $arrSettings['homepage_hero_caption']        = validateInput('homepage_hero_caption');
    $arrSettings['homepage_content_photo_path']  = validateInput('homepage_content_photo_path');
    $arrSettings['homepage_stay_photo_path']     = validateInput('homepage_stay_photo_path');
    $arrSettings['homepage_polaroid_photo_path'] = validateInput('homepage_polaroid_photo_path');
    $arrSettings['homepage_polaroid_text']       = validateInput('homepage_polaroid_text');
    $arrSettings['reviews_photo_path']           = validateInput('reviews_photo_path');

    $arrSettings['map_latitude']         = validateInput('map_latitude');
    $arrSettings['map_longitude']        = validateInput('map_longitude');
    $arrSettings['map_heading']          = validateInput('map_heading');
    $arrSettings['map_address']          = validateInput('map_address');
    $arrSettings['map_zoom_level']       = validateInput('map_zoom_level', FILTER_VALIDATE_INT);
    $arrSettings['map_marker_latitude']  = validateInput('map_marker_latitude', FILTER_VALIDATE_FLOAT);
    $arrSettings['map_marker_longitude'] = validateInput('map_marker_longitude', FILTER_VALIDATE_FLOAT);
        
    if( updateRow($arrSettings, 'general_settings', "WHERE `id` = '{$id}' LIMIT 1") ) { 
      
        $message = "Settings have been saved";

    }

  }

  /** SAVE SOCIAL LINKS DATA */

  $socialLinksUrls = $_POST['social-item'];

  if (!empty($socialLinksUrls)) { 

    $totalSocialUrls = count($socialLinksIds);

    foreach ($socialLinksUrls as $socialLinksId => $socialLinkUrl) { 

      $socialLinkUrl = filter_var($socialLinkUrl, FILTER_VALIDATE_URL);
      
      $arrSocialLink = array();
      $arrSocialLink['url'] = getNullIfEmpty($socialLinkUrl);

      $end = "WHERE `id` = '{$socialLinksId}' LIMIT 1";

      updateRow($arrSocialLink, 'social_links', $end);

    }
  }

  /** SAVE IMPORTANT PAGE DATA **/

  $impPageIds = $_POST['imp_page_id'];

  foreach ($impPageIds as $impPageId => $pageId) { 

    $end = "WHERE `imppage_id` = '{$impPageId}' LIMIT 1";

    $arrUpdateImpPage = array();

    $arrUpdateImpPage['page_id'] = getNullIfEmpty($pageId);

    updateRow($arrUpdateImpPage, 'general_importantpages', $end);

  }

  $message = "Settings have been saved";
}
?>