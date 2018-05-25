<?php

require_once ('../utility/config.php');

if(!$c_Connection->Connect())
{
	echo "Database connection failed";
	exit;
}

if($debug)
{
	include_once $classdir.'/firephp/fb.php';
	FB::setEnabled($debug);
}

$request_type = ($_POST) ? $_POST : $_GET;

$action       = sanitizeVar($request_type['action']);


if (!defined('LODGE_ID')) define('LODGE_ID', $_SESSION['site_lodge_id']);

switch($action)
{
	case 'sign-up':
		doMailchimpSignup();
		break;
}

function doMailchimpSignup()
{
	global $request_type;

	$msg      = '';
	$msgType = 'form--newsletter__msg--error';
	$isValid = false;

	$fullName     = '';
	$emailAddress = sanitizeOne($request_type['email']);

	if (!empty($emailAddress)) {

		if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) { 
			
			$mailchimpData = fetchRow("SELECT `mailchimp_api_key`, `mailchimp_list_id` 
				FROM `general_settings` 
				WHERE ".((!empty(LODGE_ID)) ? "`lodge_id` = '".LODGE_ID."' " : "`id` = '1' ")."
				LIMIT 1");

			if ($mailchimpData) { 

				$userInfo = array('FNAME' => $fullName, 'LNAME' => '');

				$objMcApi  = new MCAPI($mailchimpData['mailchimp_api_key']);

				$listId = $mailchimpData['mailchimp_list_id'];

				if ($objMcApi->listSubscribe($listId, $emailAddress, $userInfo) === true) { 

					$msg      = 'Success! Check your email to confirm sign up.';
					$msgType = 'form--newsletter__msg--success';
					$isValid = true;

				} else {
					$msg = $objMcApi->errorMessage;
				}
			}

		} else {
			$msg = 'Invalid email address provided.';
		}

	} else {
		$msg = 'Your name and email address is required.';
	}


	die( json_encode( array( 'msg' => $msg, 'type' => $msgType, 'isValid' => $isValid ) ) );
}

?>