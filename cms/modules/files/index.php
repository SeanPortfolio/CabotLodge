<?php
/**
 * Manage Files
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

  global $moduleMainHeading;

	$moduleMainHeading = 'File Manager';
	$moduleContent     = '';
	
	$fileManagerPath = ADMIN_BASE_PATH.DS.MODULES_DIR.DS.'files'.DS.'datamanager';

	$fileManagerFilePath = $fileManagerPath.DS.'init.php';

	$errorFile = file_get_contents(TEMPLATES_DIR_PATH.DS.'403.html');

	$userInd = fetchValue("SELECT `user_id` 
		FROM `cms_users` 
		WHERE `user_id` = '".USER_ID."' LIMIT 1");

	if (is_dir($fileManagerPath) 
	 && file_exists($fileManagerFilePath) 
	 && !is_dir($fileManagerFilePath)) {
 		
 		if (!empty($_SESSION['s_user_id']) && $userInd) {

			include_once($fileManagerFilePath);

		} else {

			echo $errorFile;
			die();
			
		}

 	}
    
	require "resultPage.php";
	echo $resultPageContent;
	exit();
}

?>
