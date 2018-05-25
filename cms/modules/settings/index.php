<?php
/**
 * Manage website general settings
 *
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */
function initMain()
{

  global $message, $moduleMainHeading, $do;

  $action     = requestVar('action');

  $moduleMainHeading = 'General Settings';

  /** Get the form action and do something */
  switch ($action) {

    case 'save':
      require_once 'save.php';
      $return = saveItem();
      break;
  }
  
  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }
  
  $sql = "SELECT `id`,
      `company_name`,
      `start_year`,
      `email_address`,
      `phone_number`,
      `address`,
      `booking_id`,
      `booking_url`,
      `js_code_head_close`,
      `js_code_body_open`,
      `js_code_body_close`,
      `adwords_code`,
      `robot_meta_tag`,
      `mailchimp_api_key`,
      `mailchimp_list_id`,
      `map_latitude`,
      `map_longitude`,
      `map_address`,
      `map_heading`,
      `map_zoom_level`,
      `map_marker_latitude`,
      `map_marker_longitude`,
      `map_styles`,
      `slideshow_speed`,
      `homepage_hero_caption`,
      `homepage_content_photo_path`,
      `homepage_stay_photo_path`,
      `homepage_polaroid_photo_path`,
      `homepage_polaroid_text`,
      `reviews_photo_path`
    FROM `general_settings`
    WHERE `id` = '1'
    LIMIT 1";

  $siteData = fetchRow($sql); 
    
  /** define vars */

  $id                   = $siteData['id'];
  $gsCompanyName        = $siteData['company_name'];
  $gsStartYear          = $siteData['start_year'];
  $gsEmailAddress       = $siteData['email_address'];
  $gsPhoneNumber        = $siteData['phone_number'];
  $gsAddress            = $siteData['address'];
  $gsBookingId          = $siteData['booking_id'];
  $gsBookingUrl         = $siteData['booking_url'];
  $gsSlideshowSpeed     = $siteData['slideshow_speed'];

  $gsCodeHeadClose      = $siteData['js_code_head_close'];
  $gsCodeBodyOpen       = $siteData['js_code_body_open'];
  $gsCodeBodyClose      = $siteData['js_code_body_close'];
  $gsCodeAdwords        = $siteData['adwords_code'];
  $gsRobotsMetaTag      = $siteData['robot_meta_tag'];

  $gsMailchimpApiKey    = $siteData['mailchimp_api_key'];
  $gsMailchimpListId    = $siteData['mailchimp_list_id'];

  $gsMapLatitude        = $siteData['map_latitude'];
  $gsMapLongitude       = $siteData['map_longitude'];
  $gsMapAddress         = $siteData['map_address'];
  $gsMapHeading         = $siteData['map_heading'];
  $gsMapZoomLevel       = $siteData['map_zoom_level'];
  $gsMapMarkerLatitude  = $siteData['map_marker_latitude'];
  $gsMapMarkerLongitude = $siteData['map_marker_longitude'];
  $gsMapStyles          = $siteData['map_styles'];

  $gsHomeHeroCaption       = $siteData['homepage_hero_caption'];
  $gsHomeContentPhotoPath  = $siteData['homepage_content_photo_path'];
  $gsHomeStayPhotoPath     = $siteData['homepage_stay_photo_path'];
  $gsHomePolaroidPhotoPath = $siteData['homepage_polaroid_photo_path'];
  $gsHomePolaroidPhotoText = $siteData['homepage_polaroid_text'];
  $gsReviewsPhotoPath      = $siteData['reviews_photo_path'];

  $gsMapHeading   = (!empty($gsMapHeading)) ? $gsMapHeading    : $gsCompanyName ;
  $gsMapAddress   = (!empty($gsMapAddress)) ? $gsMapAddress    : $gsAddress ;
  $gsMapZoomLevel = (!empty($gsMapZoomLevel)) ? $gsMapZoomLevel: 12 ;

  /** Module actions */
	$moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
    </ul>';

  /** Company tab content */
  require_once MOD_VIEWS_DIR.DS.'company_details.php';

    /** Home tab content */
  require_once MOD_VIEWS_DIR.DS.'home_details.php';

  /** Map tab content */
  require_once MOD_VIEWS_DIR.DS.'map.php';

  /** Social tab content */
  require_once MOD_VIEWS_DIR.DS.'social.php';

  /** Mailchimp tab content */
  require_once MOD_VIEWS_DIR.DS.'mailchimp.php';

  /** Important pages tab content */
  require_once MOD_VIEWS_DIR.DS.'important_pages.php';

  /** Developer content tab content */
  require_once MOD_VIEWS_DIR.DS.'developer_content.php';


  /** Generate tab array */

  $arrMenuTabs = array();

  $arrMenuTabs['Company Details']    = $tabCompanyDetailsContent;
  $arrMenuTabs['Home Details']       = $tabHomeDetailsContent;
  $arrMenuTabs['Google Map']         = $tabMapContent;
  $arrMenuTabs['MailChimp']          = $tabMailchimpContent;
  $arrMenuTabs['Social Links']       = $tabSocialLinksContent;
  $arrMenuTabs['Important Pages']    = $tabImportantPagesContent;
  $arrMenuTabs['Template Codes']     = $tabDeveloperContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'"
    method="post" name="pageList" enctype="multipart/form-data">
			<div id="tabs">
				<ul>'.$tabList.'</ul>
				'.$tabContent.'
			</div>
			<input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
	</form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}

?>