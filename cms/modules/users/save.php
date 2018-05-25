<?php

/** Save CMS user. */

function saveItem()
{
	global $message, $id;

	$arrUserData['user_fname'] = validateInput('user_fname');
	$arrUserData['user_lname'] = validateInput('user_lname');
	$arrUserData['user_email'] = validateInput('user_email',FILTER_VALIDATE_EMAIL);

	if ($id != USER_ID && ACCESS_USERACCESSLEVEL == FLAG_YES) {
		
		$arrUserData['access_id'] = validateInput('access_id');

	}

	if (requestVar('user_pass') != "********" && ACCESS_USERPASSWORDS == FLAG_YES) {
			
		$arrUserData['user_pass'] = sha1(requestVar('user_pass'));
	}

	updateRow($arrUserData, 'cms_users', "WHERE `user_id` = '{$id}'");
	$message = "User details saved";
}
