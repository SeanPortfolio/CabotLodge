<?php
/**
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

/** Include Required Files & System config file */

require_once 'utility/config.php';

if ($debug) {

	FB::setEnabled($debug);

}

/** CONNECT TO DATABASE */

if (!$c_Connection->Connect()) { 

	echo "Database connection failed";
	exit;

}

/** HANDLE 301 REDIRECTS */

$requestScheme = $_SERVER['REQUEST_SCHEME'];
$requestScheme = (!empty($requestScheme)) ? $requestScheme : "http";

$requestedUrl = rtrim("http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", '/');

$nonWwwRequestedUrl = str_replace('www.', '', $requestedUrl);

$redirectSQL = "SELECT 
	`new_url`, 
	`status_code`
	FROM `redirect`
	WHERE ( `old_url` = '{$requestedUrl}' 
			OR `old_url` = '{$nonWwwRequestedUrl}'
			OR `old_url` = '{$nonWwwRequestedUrl}/'
			OR `old_url` = '{$requestedUrl}/'
		)
    AND `old_url` != `new_url`
		AND `status` = '".FLAG_ACTIVE."'
	LIMIT 1";

$redirectDetails = fetchRow($redirectSQL);

if (!empty($redirectDetails)) {
	
	$location   = $redirectDetails['new_url'];
	$statusCode = $redirectDetails['statusCode'];

	Helper::redirect($location, 301);

}

/**
 *  Get the query string and split the name value pairs
 * Add the non-processed mod_rewrite queries to $_GET
 */
parse_str( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY), $_GET2 ); 

$_GET = array_merge($_GET, $_GET2);

$page = sanitizeSqlSafe($_GET['pg']);

$option1 = sanitizeSqlSafe($_GET['a']);
$option2 = sanitizeSqlSafe($_GET['b']);
$option3 = sanitizeSqlSafe($_GET['c']);
$option4 = sanitizeSqlSafe($_GET['d']);
$option5 = sanitizeSqlSafe($_GET['e']);
$option6 = sanitizeSqlSafe($_GET['f']);
$option7 = sanitizeSqlSafe($_GET['g']);

$uriSegments = array();

if (!empty($page)) { 
	array_push($uriSegments, $page);
}

if (!empty($option1)) { 
	array_push($uriSegments, $option1);
}

if (!empty($option2))  { 
	array_push($uriSegments, $option2);
}

if (!empty($option3)) { 
	array_push($uriSegments, $option3);
}

if (!empty($option4)) {
	array_push($uriSegments, $option4);
}

if (!empty($option5)) { 
	array_push($uriSegments, $option5);
}

if (!empty($option6)) { 
	array_push($uriSegments, $option6);
}

if (!empty($option7)) { 

	array_push($uriSegments, $option7);
}

/** REQUIRED FILES
 * Get page/website-settings/module information from db
 */

require_once INCLUDES_DIR_PATH.DS."pageInfo.php";  

/** INCLUDE NAVIGATION FILE */
require_once INCLUDES_DIR_PATH.DS."components".DS."main.php";                   
require_once INCLUDES_DIR_PATH.DS."views".DS."main.php";

/** GET MODULES */

$sql = "SELECT mt.`mod_id` AS id, 
	mt.`tmplmod_rank` AS rank, 
	m.`mod_path`
    FROM `module_templates` mt
    LEFT JOIN `modules` m 
    	ON (m.`mod_id` = mt.`mod_id`) 
    WHERE mt.`tmpl_id` = '{$pageTemplateId}'
    AND m.`mod_path` != ''

    UNION
		
    SELECT mp.`mod_id` AS id, 
    mp.`modpages_rank` AS rank, 
    m.`mod_path`
    FROM `module_pages` mp
    LEFT JOIN modules m
    	ON (m.`mod_id` = mp.`mod_id`)
    WHERE mp.`page_id` = '{$mainPageId}'
    AND m.`mod_path` != ''    
    ORDER BY `rank` ASC";

$pageModules = fetchAll($sql);

if (!empty($pageModules)) { 

	foreach ($pageModules as $key => $pageModule) { 

		$pageModulePath = $pageModule['mod_path'];

	  include_once (MODULES_DIR_PATH.DS."{$pageModulePath}/main.php");
	}
} 


/** ADD TEMPLATE BODY CLASS */

$templateTags['js_vars']          = '<script type="text/javascript"> var jsVars = '.json_encode($jsVars).'; </script>';
$templateTags['body_cls']         = ($templateTags['body_cls']) ? trim($templateTags['body_cls']) : '';
$templateTags['content_main_cls'] = ($templateTags['content_main_cls']) ? trim($templateTags['content_main_cls']) : '';

/** ADD CANONICAL TAGS */

if (!empty($pageCanonicalTags)) {

	$templateTags['page_canonical_tag'] = $pageCanonicalTags;

}

/** ADD ROBOT TAGS */
if($isRobotMetaTag == FLAG_YES) {

	$pageMetaIndex = fetchValue("SELECT `value`
    FROM `page_meta_index`
		WHERE `id` = '{$pageMetaIndexId}'");
		
  if(!empty($pageMetaIndex)) {
		
		$templateTags['robots_meta_tag'] = '<meta name="robots" content="'.$pageMetaIndex.'">';
	
	} 

} else {

  $templateTags['robots_meta_tag'] = '<meta name="robots" content="NOINDEX, NOFOLLOW">';

}

/**
 * OUTPUT PAGE VIEW
 * IF PRODUCTION THEN OUTPUT MINIFIED
 * IF DEV THEN OUTPUT UNMINIFIED
 */

require_once INCLUDES_DIR_PATH.DS."resultPage.php";  

if (PRODUCTION_MODE === true) {
	
	ob_start("sanitizeOutput");
	echo $pageView;
	ob_end_flush();

} else {

	echo $pageView;

}

exit();

?>