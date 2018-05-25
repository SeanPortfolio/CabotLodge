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

 /** Include Required Files */
require_once ('../utility/config.php');  

/** Get the query string and split the name value pairs */

$do          = getNullIfEmpty(sanitizeCallback(requestVar('do')));
$userSession = getNullIfEmpty(sanitizeVar($_SESSION['s_user_id'], FILTER_VALIDATE_INT));
$action      = getNullIfEmpty(sanitizeCallback(requestVar('action'))); 
$id          = getNullIfEmpty(sanitizeVar(requestVar('id'), FILTER_VALIDATE_INT));

$disableMenu = (requestVar('disableMenu') == 'true') ? true : false;

$jsVars      = array();
$loginCls    = '';


/** Include login module and check for valid session */
require_once MODULES_DIR.DS.'login'.DS.'login.php';


/** Get CMS settings and convert it to variables */
$mainPageContent = "";

$settingsResult = fetchAll("SELECT `cmsset_name`,
    `cmsset_value`
  FROM `cms_settings`
  WHERE `cmsset_status` = 'A'");    

foreach ($settingsResult AS $row) {

  ${$row['cmsset_name']} = $row['cmsset_value'];

}

/** Check param "do" and take action */
if ($do === 'login') {
    
  do_login();                                  
  
  $do = 'dashboard';                           

  if ($message != "" && $valid == 0) {

    $mainPageContent = <<< HTML
      <div class="alert alert-danger">
        <strong>{$message}</strong>
      </div>
HTML;

    $loginCls = ' invalid';

  }

} elseif ($do == 'logout') { 

  do_logout();  

  if($message != "")  {

    $mainPageContent = <<< HTML
      <div class="alert alert-success">
        <strong>$message</strong>
      </div>
HTML;

  }

} elseif (!empty($userSession)) {

  $isValidSession = check_session();    
  
  if ($do=="") {

    $do='dashboard';

  }

} else  {

  $isValidSession = FLAG_NO; 

}

/* user has logged in and has a valid login session */

if (!empty($do) && $isValidSession == FLAG_YES) {

  define(USER_ID,    $_SESSION['s_user_id']);
  define(USER_FNAME, $_SESSION['s_user_fname']);
  define(USER_LNAME, $_SESSION['s_user_lname']);
  define(USER_EMAIL, $_SESSION['s_user_email']);
  define(ACCESS_ID,  $_SESSION['s_access_id']);

  $access_arr = fetchRow("SELECT *
    FROM cms_accessgroups
    WHERE access_id = '".ACCESS_ID."'");

  require_once 'access.php';

  $module_path = MODULES_DIR.DS.$do.DS.'index.php';

  /** 
   * Get the include file from the do variable, load it in
   * and run the main subroutine.
   */

  if (file_exists($module_path) && !is_dir($module_path)) {
    
    require_once $module_path;

    initMain();       

  } else {

    die('<pre>#Invalid request</pre>');

  }

} else {

  /** user is not logged in so give them the login page */
  display_login_screen();
}

require "resultPage.php"; 
echo $resultPageContent;
exit();

?>