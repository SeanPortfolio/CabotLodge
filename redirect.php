<?php

// session_start();   
// require_once ('utility/config.php');

// if(!$c_Connection->Connect())
// {
// 	echo "Database connection failed";
// 	exit;
// }


// function csv_to_array($filename='', $delimiter=',')
// {
// 	if(!file_exists($filename) || !is_readable($filename))
// 		return FALSE;
	
// 	$header = NULL;
// 	$data = array();
// 	if (($handle = fopen($filename, 'r')) !== FALSE)
// 	{
// 		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
// 		{
// 			if(!$header)
// 				$header = array(0,1);
// 			else
// 				$data[] = array_combine($header, $row);
// 		}
// 		fclose($handle);
// 	}
// 	return $data;
// }


// $csv_content = csv_to_array('redirects2.csv');

// $added_urls = array();

// foreach ($csv_content as $data)
// {

// 	$old_url = $data[0];
// 	$new_url = $data[1];

// 	if( !in_array($old_url, $added_urls) )
// 	{
// 		$redirect_data = array();

// 		$redirect_data['old_url'] = $old_url;
// 		$redirect_data['new_url'] = $new_url;

// 		insertRow($redirect_data, 'redirect');


// 		$added_urls[] = $old_url;
// 	}
// }

?>