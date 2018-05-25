<?php
/**
 * GET Page information and respective details. Create and manage template tags.
 * 
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

/** GET PAGE CONTENT */

function getPageContent($pageMetaDataId)
{
    $output  = '';
    $columns = array();
    
    $pageMetaDataId = filter_var($pageMetaDataId, FILTER_VALIDATE_INT);
    
    $columnsQuery = runQuery("SELECT cc.`content`, 
        cc.`css_class`,
        cc.`content_row_id`
        FROM `content_column` cc
        LEFT JOIN `content_row` cr
            ON(cc.`content_row_id` = cr.`id`)
        WHERE cr.`page_meta_data_id` = '{$pageMetaDataId}' 
        ORDER BY cr.`rank`, cc.`rank`");


    if (mysql_num_rows($columnsQuery) > 0) {
        while ($arrColumn = mysql_fetch_assoc($columnsQuery)) {
            $columns[$arrColumn['content_row_id']][] = $arrColumn;
        }

        $rowsQuery = runQuery("SELECT `id` 
            FROM `content_row` 
            WHERE `page_meta_data_id` = '{$pageMetaDataId}' 
            ORDER BY `rank`");

        while ($row = mysql_fetch_assoc($rowsQuery)) {
            $rowId = $row['id'];

            $output .= '<div class="row content__row">';

            foreach ($columns[$rowId] as $column) {
                $output .= '<div class="'.$column['css_class'].'">'.$column['content'].'</div>';
            }

            $output .= '</div>';
        }
    }

    return $output;
}

/** GET LIST OF IMPORTANT PAGES */

function fetchImportantPages()
{

  $sql = "SELECT ip.`imppage_name` AS name, 
    pmd.`url`, 
    pmd.`full_url`,
    pmd.`name` AS menu_name, 
    pmd.`menu_label`,
    pmd.`footer_menu`,  
    pmd.`title`, 
    gp.`id` AS pg_id
    FROM `general_importantpages` ip
    LEFT JOIN `general_pages` gp
      ON(ip.`page_id` = gp.`id`)
    LEFT JOIN `page_meta_data` pmd
      ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` = 'A'
    AND pmd.`url` != ''";  
    
    $resultQuery = runQuery($sql);

    $impPages = array();

    while ($array = mysql_fetch_assoc($resultQuery)) {
      
      $impPageUrl  = ($impPageName != '')  ? $array['url'] : 'home' ;

      $impPageName = strtolower(str_replace(' ', '', $array['name']));

      $impPages["impage_{$impPageName}"] = (object) array(

        'menu_label'        => (($array['menu_label']) ? $array['menu_label']  : $array['menu_name']),
        'footer_menu_label' => (($array['footer_menu']) ? $array['footer_menu']: $array['menu_name']),
        'url'               => $impPageUrl,
        'full_url'          => $array['full_url'],
        'abs_full_url'      => Helper::getFullUrl( $array['full_url']),
        'id'                => $array['pg_id'],
        'title'             => $array['title'],

      );
    }

    return $impPages;
}

$objImpPages = fetchImportantPages();

/** SET IMPORTANT PAGES VARS */
$impPageHome            = $objImpPages['impage_home'];
$impPage404             = $objImpPages['impage_404'];
$impPageContact         = $objImpPages['impage_contact'];
$impPageGallery         = $objImpPages['impage_gallery'];
$impPageReviews         = $objImpPages['impage_reviews'];
$impPageBlog            = $objImpPages['impage_blog'];
$impPageAccommodation   = $objImpPages['impage_accommodation'];
$impPageExperience      = $objImpPages['impage_experience'];
$impPageBookings        = $objImpPages['impage_bookings'];
$impPageHistory         = $objImpPages['impage_history']; 

/** @TODO HANDLE PAGE URLS AND 404's */
function fetchPageInfo(array $ignoreUrls = array())
{
  global $uriSegments, $impPage404, $impPageBlog;

  $ignoreUrls  = array($impPageBlog->full_url);

  $requestUri = '/'.implode('/', $uriSegments);

  $pageData = array();

  $sql = "SELECT pmd.`name`,
      pmd.`menu_label`,
      pmd.`footer_menu`,
      pmd.`heading`,
      pmd.`sub_heading`,
      pmd.`quicklink_heading`,
      pmd.`quicklink_button_text`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`introduction`,
      pmd.`short_description`,
      pmd.`description`,
      pmd.`photo_caption_heading`,
      pmd.`photo_caption`,
      pmd.`photo_path`,
      pmd.`thumb_photo_path`,
      pmd.`motif_photo_path`,
      pmd.`video_id`,
      pmd.`title`,
      pmd.`meta_description`,
      pmd.`og_title`,
      pmd.`og_meta_description`,
      pmd.`og_image`,
      pmd.`page_code_head_close`,
      pmd.`page_code_body_open`,
      pmd.`page_code_body_close`,
      pmd.`status`,
      pmd.`gallery_id`,
      pmd.`slideshow_id`,
      pmd.`template_id`,
      pmd.`page_meta_index_id`,
      gp.`id`,
      gp.`parent_id`,        
      gp.`page_meta_data_id`
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
    LEFT JOIN `page_meta_index` pmi
        ON(pmi.`id` = pmd.`page_meta_index_id`)
    WHERE pmd.`status` = '".FLAG_ACTIVE."'";

  $sqlExt = "";

  if (!empty($uriSegments)) {

    $arrPossibleUrls  = array();
    $totalUriSegments = count($uriSegments);
    $is404            = false;

    for ($i = ($totalUriSegments -1); $i >= 0; $i--) {
        
      $possibleUrl = '';

      foreach ($uriSegments as $j => $uriSegment) {
          if ($j <= $i) {
              $possibleUrl .= '/'.$uriSegment;
          }
      }

      $arrPossibleUrls[] = $possibleUrl;
    }

    $sqlExt .= " AND pmd.`full_url` IN ('".implode("','", $arrPossibleUrls)."') ";
    $sqlExt .= " ORDER BY FIELD(pmd.`full_url`, '".implode("','", $arrPossibleUrls)."') ";
  
    $rQuery     = runQuery(($sql.$sqlExt));
    
    $totalPages = mysql_num_rows($rQuery);
    
    if ($totalPages > 0) {
      $arrPages = array();

      $pagIndex = false;

      while ($arrPage = mysql_fetch_assoc($rQuery)) {
          $fullUrl  = $arrPage['full_url'];
          
          $pagIndex = array_search($fullUrl, $arrPossibleUrls);

          if ($pagIndex !== false) {
              $arrPages[0] = $arrPage;

              break;
          }
      }

      $pageData = $arrPages[0];

      $pageData['urlIndex'] = $pagIndex;

      $pageDataFullURL = $pageData['full_url'];
    
      $pageURI = '/'.preg_quote($pageDataFullURL, '/').'/';
    
      $arrRemaningSegments =  explode('/',preg_replace($pageURI, '', $requestUri, 1));

      $arrRemaningSegments = array_filter($arrRemaningSegments);
      
      if (!empty($arrRemaningSegments) && !in_array($pageDataFullURL, $ignoreUrls)) {

        $remaningSegmentsURI  = implode("','", $arrRemaningSegments);

        $csvActivePageIds = fetchValue("SELECT GROUP_CONCAT(DISTINCT(pmd.`id`))
          FROM `general_pages` gp
          LEFT JOIN `page_meta_data` pmd
            ON(gp.`page_meta_data_id` = pmd.`id`)
          WHERE pmd.`status` = '".FLAG_ACTIVE."'
          ORDER BY pmd.`rank` ");

        $sqlRemaningSegments = "SELECT COUNT(DISTINCT(pmd.`url`))
          FROM `page_meta_data` pmd
          WHERE `url` IN('".$remaningSegmentsURI."')
            AND pmd.`id` NOT IN ({$csvActivePageIds})
            AND pmd.`status` = '".FLAG_ACTIVE."'";

        $totalExtraPages = fetchValue( $sqlRemaningSegments );
        
        if ($totalExtraPages < count($arrRemaningSegments)) {
          
          $is404 = true;
        
        }
      
      }

    } else {
      
      $is404 = true;
    
    }
    if ($is404 === true) {

      $sql .= " AND pmd.`url` = '".$impPage404->url."'";
      $sql .= " LIMIT 1 ";

      $pageData = fetchRow($sql);

      header("HTTP/1.1 404 Not Found");
    }
    
  } elseif (empty($uriSegments)) { // SHOW HOME PAGE

    $sql .= " AND pmd.`url` = 'home' ";
    $sql .= " LIMIT 1 ";


    $pageData = fetchRow($sql);
  }

  // GET PAGE URL
  if (!empty($pageData)) {
      $pageData['content'] = getPageContent($pageData['page_meta_data_id']);
  }
  
  return $pageData;
}

$arrPageData = fetchPageInfo();

$currentUrlSegments = array_filter(explode('/', $arrPageData['full_url']));
$lastSegment        = end($currentUrlSegments);

$pageIndex   = (array_search($lastSegment, $uriSegments)+1);

/**  DYNAMICALLY GENERATED PAGE SEGMENTS/OPTIONS */
$segment1 = ${"option{$pageIndex}"};
$segment2 = ${"option".($pageIndex+1)};
$segment3 = ${"option".($pageIndex+2)};
$segment4 = ${"option".($pageIndex+3)};

/** FETCH SETTINGS */

function fetchSettings()
{
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
    `map_styles`,
    `map_heading`,
    `map_zoom_level`, 
    `map_marker_latitude`, 
    `map_marker_longitude`,
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

  return fetchRow($sql);
}

$arrSettings = fetchSettings();

/** CREATE WEBSITE SETTINGS VARS */

$companyName         = $arrSettings['company_name'];
$siteStartYear       = $arrSettings['start_year'];
$contactEmailAddress = $arrSettings['email_address'];
$contactPhoneNumber  = $arrSettings['phone_number'];
$contactAddress      = $arrSettings['address'];
$mainBookingUrl      = $arrSettings['booking_url'];
$mainBookingId       = $arrSettings['booking_id'];

$isRobotMetaTag      = $arrSettings['robot_meta_tag'];
$jsCodeHeadClose     = $arrSettings['js_code_head_close'];
$jsCodeBodyOpen      = $arrSettings['js_code_body_open'];
$jsCodeBodyClose     = $arrSettings['js_code_body_close'];
$adwordsCode         = $arrSettings['adwords_code'];

$mailchimpApiKey     = $arrSettings['mailchimp_api_key'];
$mailchimpListId     = $arrSettings['mailchimp_list_id'];

$mapHeading          = $arrSettings['map_heading'];
$mapAddress          = $arrSettings['map_address'];
$zoomLevel           = $arrSettings['map_zoom_level'];
$latitude            = $arrSettings['map_latitude'];
$longitude           = $arrSettings['map_longitude'];
$markerLatitude      = $arrSettings['map_marker_latitude'];
$markerLongitude     = $arrSettings['map_marker_longitude'];

$slideshowSpeed      = $arrSettings['slideshow_speed'];

$homepageHeroCaption      = $arrSettings['homepage_hero_caption'];
$homepageContentPhotoPath = $arrSettings['homepage_content_photo_path'];
$homepageStayPhotoPath    = $arrSettings['homepage_stay_photo_path'];
$homepagePolaroidPhoto    = $arrSettings['homepage_polaroid_photo_path'];
$homepagePolaroidText     = $arrSettings['homepage_polaroid_text'];
$reviewsPhotoPath         = $arrSettings['reviews_photo_path'];

$objContactEmails    = getEmailList($contactEmailAddress);
$contactPrimaryEmail = $objContactEmails->primaryEmail;

$objCurrentDate = new DateTime();
$sqlCurrentDate = $objCurrentDate->format('Y-m-d');

/** CREATE PAGE DATA VARS */

$templateTags = array();

$templateTags = array_merge($templateTags, $arrPageData);

$mainPageId               = $templateTags['id'];
$pageParentId             = $templateTags['parent_id'];

$pageMenuLabel            = $templateTags['menu_label'];
$pageFooterMenuLabel      = $templateTags['footer_menu'];
$pageHeading              = $templateTags['heading'];
$pageSubHeading           = $templateTags['sub_heading'];
$pageUrl                  = $templateTags['url'];
$pageFullUrl              = $templateTags['full_url'];
$pageIntroduction         = $templateTags['introduction'];
$pageShortDescription     = $templateTags['short_description'];
$pageDescription          = $templateTags['description'];
$pagePhotoCaptionHeading  = $templateTags['photo_caption_heading'];
$pagePhotoCaption         = $templateTags['photo_caption'];
$pagePhotoPath            = $templateTags['photo_path'];
$pageThumbPhotoPath       = $templateTags['thumb_photo_path'];
$pageMotifPath            = $templateTags['motif_photo_path'];
$pageContent              = $templateTags['content'];
$pageVideoId              = $templateTags['video_id'];
$pageTitle                = $templateTags['title'];
$pageMetaDescription      = $templateTags['meta_description'];
$pageOgTitle              = $templateTags['og_title'];
$pageOgMetaDescription    = $templateTags['og_meta_description'];
$pageOgImage              = $templateTags['og_image'];
$pageCodeHeadClose        = $templateTags['page_code_head_close'];
$pageCodeBodyOpen         = $templateTags['page_code_body_open'];
$pageCodeBodyClose        = $templateTags['page_code_body_close'];
$pageGalleryId            = $templateTags['gallery_id'];
$pageSlideshowId          = $templateTags['slideshow_id'];
$pageTemplateId           = $templateTags['template_id'];
$pageMetaIndexId          = $templateTags['page_meta_index_id'];
$pageMetaDataId           = $templateTags['page_meta_data_id'];


// INIT ANY EMPTY TEMPLATE TAGS
$templateTags['scripts_load_top']      = '';
$templateTags['style_int']             = '';  ## Position held for internal styles
$templateTags['style_ext']             = '';  ## Position held for external styles
$templateTags['script_ext']            = '';  ## Position held for external scripts
$templateTags['script_onload']         = '';  ## Position held for onload scripts
$templateTags['script_inline']         = '';
$templateTags['body_cls']              = '';
$templateTags['body_html']             = '';
$templateTags['mod_view']              = '';
$templateTags['footer_blog_post_view'] = '';
$templateTags['footer_review']         = '';
$templateTags['quicklinks_view']       = '';
$templateTags['newsletter_view']       = ''; 
$templateTags['page_canonical_tag']    = ''; 
$templateTags['robots_meta_tag']       = ''; 
$templateTags['ex_meta_tags']          = ''; 

// CREATE PAGE CANONICAL TAGS
if ($pageUrl != $impPage404->url) {
  
  $pageCanonicalUrl = Helper::getFullUrl($_SERVER['REQUEST_URI']);
  
  $pageCanonicalTags   = '<link rel="canonical" href="'.$pageCanonicalUrl.'">';

} else {

  $pageCanonicalTags = '';

}

// DEFINE TAGS
$templateTags['lang_iso_code']      = 'en';
$templateTags['og_url']             = Helper::getFullUrl($_SERVER['REQUEST_URI']);
$templateTags['og_image']           = Helper::getFullUrl($pageOgImage);
$templateTags['home_url']           = Helper::getFullUrl($impPageHome->full_url);

$templateLogoPath = GRAPHICS_DIR.'/logo.png';
$templateTags['template_logo_path'] = Helper::getFullUrl($templateLogoPath);

$templateLogoDarkPath = GRAPHICS_DIR.'/logo-dark.png';
$templateTags['template_logo_dark_path'] = Helper::getFullUrl($templateLogoDarkPath);

$templateWideGrungePath        = Helper::getFullUrl(GRAPHICS_DIR.'/grunge/grunge-bar-wide-2x.png');
$templateWideGrungeReversePath = Helper::getFullUrl(GRAPHICS_DIR.'/grunge/grunge-bar-wide-up-2x.png');
$motiff                        = Helper::getFullUrl(GRAPHICS_DIR.'/logo-dark.png');
$reviewsPhotoPath              = Helper::getFullUrl($reviewsPhotoPath); 
$grungeSmallPath               = Helper::getFullUrl(GRAPHICS_DIR.'/grunge/grunge-bar-small.png');
$grungeQlPath                  = Helper::getFullUrl(GRAPHICS_DIR.'/grunge/grunge-bar-ql.png');
$contactPath                   = Helper::getFullUrl($impPageContact->full_url);

$templateTags['contact_path']                = $contactPath;
$templateTags['template_footer_grunge_path'] = $templateWideGrungePath;
$templateTags['template_motiff'] = $pageMotifPath ? Helper::getFullUrl($pageMotifPath) : $motiff;

$templateTags['content_label']      = (!empty($pageContentLabel))
                                        ? '<span class="label-highlight">
                                        '.Helper::getHighlightedText($pageMenuLabelHText, $pageContentLabel).'
                                        </span>'
                                        : '';
                                        
$bookingPageUrl = Helper::getFullUrl($impPageBookings->full_url);
$templateTags['booking_link']       = $mainBookingUrl ? '<a href="'.$mainBookingUrl.'" target="_blank" class="btn btn--white-ghost text-uppercase">
                                      Book Now
                                      </a>' : '<a href="'.$bookingPageUrl.'" class="btn btn--white-ghost text-uppercase">
                                      Book Now
                                      </a>';

$templateTags['template_home_image_path']     = Helper::getFullUrl($homepageContentPhotoPath);
$templateTags['template_stay_image_path']     = Helper::getFullUrl($homepageStayPhotoPath);
$templateTags['template_polaroid_image_path'] = Helper::getFullUrl($homepagePolaroidPhoto);
$templateTags['template_sketch_image_path']   = Helper::getFullUrl(GRAPHICS_DIR.'/sketch-lodge-1.png');
$templateTags['template_polaroid_text']       = $homepagePolaroidText;

$templateCssPath = ASSETS_DIR.DS.'css/'.((PRODUCTION_MODE === false) ? '_main_xl.css' : 'main.css');
$templateJsPath  = ASSETS_DIR.DS.'js/scripts/'.((PRODUCTION_MODE === false) ? 'unmin/main.js': 'min/main.js');

// TEMPLATE ASSETS FILE PATHS
$templateTags['favicon_apple_touch_path'] = Helper::getFileFullURL('apple-touch-icon.png');
$templateTags['favicon_32x32_path']       = Helper::getFileFullURL('favicon.ico');
$templateTags['favicon_path']             = Helper::getFileFullURL('favicon.ico');
$templateTags['manifest_path']            = Helper::getFileFullURL('manifest.json');
$templateTags['safari_pinned_tab_path']   = Helper::getFileFullURL('safari-pinned-tab.svg');

$templateTags['css_path']                 = Helper::getFileFullURL($templateCssPath);
$templateTags['modernizr_path']           = Helper::getFileFullURL(ASSETS_DIR.DS.'js/vendor/min/modernizr-2.8.3.js');
$templateTags['vender_js_path']           = Helper::getFileFullURL(ASSETS_DIR.DS.'js/vendor/min/production.js');
$templateTags['js_path']                  = Helper::getFileFullURL($templateJsPath);

$templateTags['accommodation_path']       = Helper::getFullUrl($impPageAccommodation->full_url);
$templateTags['history_path']             = Helper::getFullUrl($impPageHistory->full_url);
  
include_once "{$incdir}/components/credits/main.php";

$templateTags = array_merge($arrSettings, $templateTags);

/** ADD PAGE DEVELOPER CODE CONTENT TO SITE LEVEL DEVELOPER CODE CONTENT */

$templateTags['js_code_head_close']	 .= (!empty($pageCodeHeadClose)) ? $pageCodeHeadClose : '' ;
$templateTags['js_code_body_open']   .= (!empty($pageCodeBodyOpen)) ? $pageCodeBodyOpen : '' ;
$templateTags['js_code_body_close']  .= (!empty($pageCodeBodyClose)) ? $pageCodeBodyClose : '' ;

/** CREATE JS VARS ARRAY */
$jsVars = array(

  'globals' => array(
    'baseUrl'=> BASE_URL,
    'slideshowSpeed' => (($slideshowSpeed) ? ($slideshowSpeed * 1000) : 5000)
  ),
  'data' => array(),
  'templates' => array()

);

/* Add body class to define homepage and general pages */

if($page == $page_home->url){
  $templateTags['body_cls'] .= ' home-page';
} else{
  $templateTags['body_cls'] .= ' general-page';
}

/* Add footer block */

$footerContactView = '<div class="footer-contact-item">
<div class="footer-contact-item__content">
  <h3 class="footer-contact-item__heading">Get in Touch</h3>
  <div class="footer-contact-item__summary">
  Want to enquire or know more about Cabot Lodge before booking? Talk to us!
  <p class="footer-contact-item__summary--phone">'.$contactPhoneNumber.'</p>
  </div>
 <div class="footer-contact-item__btn">
   <a href="'.$impPageContact->full_url.'"" class="btn btn btn--white-ghost text-uppercase">Contact Us</a>
 </div>
</div>				
</div>';

$templateTags['footer_contact_view'] = $footerContactView;
