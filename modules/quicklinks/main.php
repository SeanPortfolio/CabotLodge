<?php

$quicklinksView = '';

if ($mainPageId == $impPageHome->id) {

	include_once 'views/home.php';

} else if ($mainPageId == $impPageExperience->id) {

	include_once 'views/experience.php';

} else {
	
	include_once 'views/default.php';

}

?>