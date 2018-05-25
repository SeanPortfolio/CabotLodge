<?php

require_once ('../../utility/config.php'); ## System config file

if(!$c_Connection->Connect())
{
    echo "Database connection failed";
    exit;
}

$Message   = "";
$c_Message = $c_Connection->GetMessage();

$action = mysql_real_escape_string($_POST['action']);

//if (!defined('LODGE_ID')) define('LODGE_ID', $_SESSION['lodge_id']);

switch ($action)
{
	case 'get-coords':
		get_latlng_of_address(mysql_real_escape_string($_POST['address']));
	break;
	case 'check-url':
		validate_url($_POST['url'], $_POST['currUrl'], $_POST['type']);
	break;
}

function get_latlng_of_address($address, $return_json = TRUE)
{
	if($address)
	{
		$address = str_replace(' ','+',str_replace("\n",'',str_replace("\r",'',$address)));
	
		$request_url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=true";

		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $request_url);
		curl_setopt($c, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		$json = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		$details = json_decode($json);

		$result = $details->results[0]->geometry->location;
		
		$coords = array(
			'lat'              => $result->lat,
			'lng'              => $result->lng,
			'formattedAddress' => $details->results[0]->formatted_address
		);

		if($return_json) die(return_json($coords));
		else return $coords;
	}
}

function validate_url($newUrl, $currentUrl, $type = '')
{

	$newUrl         = Helper::url($newUrl);
	$currentFullUrl = Helper::url($currentUrl);
	
	$parentPageInd  = sanitizeInput('pid', FILTER_VALIDATE_INT);
	$valid          = false;
	$message        = '';

 	if (!empty($newUrl)) {

		// Check if folder exists with the same name as the url
		$valid = (!is_dir((BASE_PATH.'/'.$newUrl)));

		if ($valid) {

			// Check if url exists
			if ($type === 'gp') {
			
				$parentFullUrl =  fetchValue("SELECT pmd.`full_url`
		            FROM `general_pages` gp
		            LEFT JOIN `page_meta_data` pmd
		            ON(pmd.`id` = gp.`page_meta_data_id`)
		            WHERE gp.`id` ".((is_null($parentPageInd)) ? " IS NULL" : " = {$parentPageInd}")."
		            LIMIT 1");
				
				$newFullUrl = $parentFullUrl.'/'.$newUrl;
   				$newFullUrl = Helper::url($newFullUrl);				

			} else {
				
				$newFullUrl = Helper::url($newUrl);			
			}
			
			$sql = "SELECT COUNT(`url`) 
				FROM `page_meta_data`
				WHERE `full_url` = '/{$newFullUrl}'
				AND `full_url` != '/{$currentFullUrl}'
				AND `status` != 'D'";
				
			$totalUrls = fetchValue($sql);

			$valid = ($totalUrls == 0);

			$message = (!$valid) ? 'URL already exists.' : '';
			
		} else {

			$message = 'URL conflicts with the system. Please enter another.';
		}

 	} else {

		$message = 'Please provide valid URL';
 	}

 	die( json_encode( array('valid' => $valid, 'message' => $message) ) );
}

?>