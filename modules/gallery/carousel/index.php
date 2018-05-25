<?php

$objPhotoGallery = new PhotoGroup($pageGalleryId);

if (!empty($objPhotoGallery->photos)) {		
	$item_index = 0;

	foreach ($objPhotoGallery->photos as $photoGalleryPhoto) {
	
		$photoGalleryVideoId = $photoGalleryPhoto['videoUrl'];
		$photoCls            = (!empty($photoGalleryVideoId)) ? ' swipebox-video swipebox' : ' swipebox';
		$photoFullUrl				 = Helper::getFullUrl($photoGalleryPhoto['thumbPath']);
		$photoAltText				 = $photoGalleryPhoto['altText'];

		$lightBoxContentUrl = (!empty($photoGalleryVideoId)) 
			? "https://www.youtube.com/watch?v={$photoGalleryVideoId}" 
			: $photoFullUrl;


		$pageGalleryView .= 
		'<a href="'.$lightBoxContentUrl.'" class="showcase__item '.$photoCls.'" data-key="'.$item_index.'">
			<span class="showcase__item__img">
				<img src="'.$photoFullUrl.'" alt="'.$photoAltText.'" class="">
			</span>
			<span class="showcase__grunge">
				<img src="'.$grungeSmallPath.'">
			</span>
		</a>';

		$item_index ++;
	}

	$pageGalleryView = '
		<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="showcase">
							<div class="showcase__carousel">
								'.$pageGalleryView.'
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>';
}

?>