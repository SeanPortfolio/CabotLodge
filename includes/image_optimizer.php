<?php
include_once('../utility/config.php');


if ( isset($_GET['imv']) ) {

	$imagePath      = $_SERVER['REDIRECT_URL'];
	$imageFullPath = "{$rootfull}{$imagePath}";	

	if ( is_file($imageFullPath) ) {
			
		list($imageWidth, $imageHeight) = explode('x', $_GET['imv']);
		
		$requestedImage = imagecreatefromjpeg($imageFullPath);
		
		if ($requestedImage === false) { 
			die ('Unable to open image'); 
		}
		
		$currentWidth  = imagesx($requestedImage);
		$currentHeight = imagesy($requestedImage);
		
		$maxWidth  = 1200;
		$maxHeight = 900;
		
		if ( isset($_GET['ratio'])) {

			//calculate new image dimensions (preserve aspect)
			if ($imageWidth && !$imageHeight) {
		
				$newWidth  = $imageWidth;
				$newHeight = $newWidth * ($currentHeight/$currentWidth);
		
			} elseif ($imageHeight && !$imageWidth) {
					
				$newHeight = $imageHeight;
				$newWidth  = $newHeight * ($currentWidth/$currentHeight);
			
			} elseif(($currentWidth < $maxWidth) && ($currentHeight > $currentHeight)) {
				
				$newWidth  = $currentWidth;
				$newHeight = ceil($newWidth * ($currentHeight/$currentWidth));

			} elseif(($currentWidth < $maxWidth) || ($currentHeight < $currentHeight)) {
			
				$newHeight = $currentHeight;
				$newWidth  = $currentWidth;

			} else {

				$newWidth  = $imageWidth ? $imageWidth : 1200;
				$newHeight = $imageHeight ? $imageHeight : 900;

				$orgRatio = ($currentWidth/$currentHeight);
				$newRatio = ($newWidth/$newHeight);

				if ($orgRatio >  $newRatio) {
					
					$newHeight = ceil($newWidth * ($currentHeight/$currentWidth));

				} else {

					$newWidth = ceil($newHeight * ($currentWidth/$currentHeight));    

				}
			}

		} else {

				$newWidth = $imageWidth;
				$newHeight = $imageHeight;
		}

		$newImage = imagecreatetruecolor($newWidth, $newHeight);
		
		imagecopyresampled($newImage, $requestedImage, 0, 0, 0, 0, $newWidth, $newHeight, $currentWidth, $currentHeight);

		// send resized image to browser
		$imageName = basename($imagePath);
		$imageExt = pathinfo($imagePath, PATHINFO_EXTENSION);
		$browserCache = 60*60*24*7;

		header('Content-Type: image/'.$imageExt);
		imagejpeg($newImage);
		imagedestroy($newImage);
		exit();
	}
}

?>