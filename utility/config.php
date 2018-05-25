<?php
session_start();

/** GENERAL VARS */

/** GENERAL CONSTANTS */

if(!defined('PRODUCTION_MODE'))         define('PRODUCTION_MODE', false);
if(!defined('DS'))                      define('DS', DIRECTORY_SEPARATOR);

if(!defined('FLAG_YES'))                define('FLAG_YES', 'Y');
if(!defined('FLAG_NO'))                 define('FLAG_NO', 'N');

if(!defined('FLAG_SLIDESHOW'))          define('FLAG_SLIDESHOW', 'S');
if(!defined('FLAG_GALLERY'))            define('FLAG_GALLERY', 'G');

if(!defined('FLAG_ACTIVE'))             define('FLAG_ACTIVE', 'A');
if(!defined('FLAG_HIDDEN'))             define('FLAG_HIDDEN', 'H');
if(!defined('FLAG_DELETED'))            define('FLAG_DELETED', 'D');

if(!defined('HOME_TEMPLATE_ID'))        define('HOME_TEMPLATE_ID', 1);
if(!defined('DEFAULT_TEMPLATE_ID'))     define('DEFAULT_TEMPLATE_ID', 2);

if(!defined('THUMB_WIDTH'))  			define('THUMB_WIDTH', 625);
if(!defined('THUMB_HEIGHT')) 			define('THUMB_HEIGHT', 420);

if(!defined('PORTRAIT_THUMB_WIDTH')) 	define('PORTRAIT_THUMB_WIDTH', 380);
if(!defined('PORTRAIT_THUMB_HEIGHT')) 	define('PORTRAIT_THUMB_HEIGHT', 525);

if(!defined('MENU_THUMB_WIDTH')) 		define('MENU_THUMB_WIDTH', 430);
if(!defined('MENU_THUMB_HEIGHT')) 		define('MENU_THUMB_HEIGHT', 310);

if(!defined('GALLERY_THUMB_WIDTH')) 	define('GALLERY_THUMB_WIDTH', 625);
if(!defined('GALLERY_THUMB_HEIGHT')) 	define('GALLERY_THUMB_HEIGHT', 420);

if(!defined('MAX_COLUMNS')) 	        define('MAX_COLUMNS', 4);
if(!defined('PAGE_MAX_ROWS')) 	        define('PAGE_MAX_ROWS', 2);

if(!defined('GC_SITE_KEY')) 	        define('GC_SITE_KEY', '6LdGfVkUAAAAALpzyCHzc8vexAvou3qeGCyQk80p');
if(!defined('GC_SECRET_KEY')) 			define('GC_SECRET_KEY', '6LdGfVkUAAAAADcY2E8xZR-usLLAH_FJJmqVMnKN');

if(!defined('GOOGLE_MAP_KEY')) 			define('GOOGLE_MAP_KEY', 'AIzaSyCqeRCfbUFp9cDWpnZPu1B8AnNnLCT9ZjQ');

/** DATABASE CONSTANTS */

if(!defined('DB_HOST'))      define('DB_HOST', 'localhost');
if(!defined('DB_NAME'))      define('DB_NAME', 'cabotlodge_db');
if(!defined('DB_USER'))      define('DB_USER', 'devtomahawk_user');
if(!defined('DB_PASSWORD'))  define('DB_PASSWORD', 'm0untain');

/** DIRECTORY NAMES CONSTANTS */

if(!defined('GRAPHICS_DIR'))  define('GRAPHICS_DIR', 'graphics');
if(!defined('ASSETS_DIR'))    define('ASSETS_DIR', 'assets');
if(!defined('TEMPLATES_DIR')) define('TEMPLATES_DIR', 'templates');
if(!defined('LIBRARY_DIR'))   define('LIBRARY_DIR', 'library');
if(!defined('UPLOADS_DIR'))   define('UPLOADS_DIR', 'uploads');
if(!defined('CLASS_DIR'))     define('CLASS_DIR', 'classes');
if(!defined('MODULES_DIR'))   define('MODULES_DIR', 'modules');
if(!defined('INCLUDES_DIR'))  define('INCLUDES_DIR', 'includes');
if(!defined('FUNCTIONS_DIR')) define('FUNCTIONS_DIR', 'functions');
if(!defined('ADMIN_DIR'))     define('ADMIN_DIR', 'cms');

if(!defined('MOD_VIEWS_DIR')) define('MOD_VIEWS_DIR', 'views');

/** DIRECTORY PATHS & URL CONSTANTS */

if(!defined('BASE_URL'))        define('BASE_URL', 'https://cabotlodge.netzone.nz');

if(!defined('BASE_PATH'))       define('BASE_PATH', ''.DS.'var'.DS.'www'.DS.'hosting'.DS.'tomahawk'.DS.'cabotlodge');

if(!defined('ADMIN_BASE_URL'))  define('ADMIN_BASE_URL', BASE_URL.'/'.ADMIN_DIR);
if(!defined('ADMIN_BASE_PATH')) define('ADMIN_BASE_PATH', BASE_PATH.DS.ADMIN_DIR);

if(!defined('GRAPHICS_DIR_PATH'))  define('GRAPHICS_DIR_PATH', BASE_PATH.DS.GRAPHICS_DIR);
if(!defined('TEMPLATES_DIR_PATH')) define('TEMPLATES_DIR_PATH', BASE_PATH.DS.TEMPLATES_DIR);
if(!defined('LIBRARY_DIR_PATH'))   define('LIBRARY_DIR_PATH', BASE_PATH.DS.LIBRARY_DIR);
if(!defined('UPLOADS_DIR_PATH'))   define('UPLOADS_DIR_PATH', BASE_PATH.DS.UPLOADS_DIR);
if(!defined('CLASS_DIR_PATH'))     define('CLASS_DIR_PATH', BASE_PATH.DS.CLASS_DIR);
if(!defined('MODULES_DIR_PATH'))   define('MODULES_DIR_PATH', BASE_PATH.DS.MODULES_DIR);
if(!defined('INCLUDES_DIR_PATH'))  define('INCLUDES_DIR_PATH', BASE_PATH.DS.INCLUDES_DIR);
if(!defined('FUNCTIONS_DIR_PATH')) define('FUNCTIONS_DIR_PATH', BASE_PATH.DS.FUNCTIONS_DIR);

/** PARKED DOMAIN CONSTANTS */

if(!defined('PLACE_HOLDER_IMG_URI')) define('PLACE_HOLDER_IMG_URI', 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');

$reservedTemplates = array(
   HOME_TEMPLATE_ID,
   DEFAULT_TEMPLATE_ID,
);

/** INCLUDE HELPER FUNCTIONS FILE */
require_once (FUNCTIONS_DIR_PATH.DS.'func_all.php');

/** Creating the Database Connections */
require_once ("CConnection.php");
$c_Connection = new CConnection();
$c_Connection->Configure(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

/** Script Processing */

/** ERROR & NOTICE REPORTING ? */

if (PRODUCTION_MODE === true) {

    error_reporting(0);

} else { 

    error_reporting(E_ALL & ~E_NOTICE);

}

/** AUTO LOAD CLASSES */

spl_autoload_register(function ($className) {

	require_once CLASS_DIR_PATH.DS."{$className}.class.php";

});


?>