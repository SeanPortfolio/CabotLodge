<?php

$objPhotoGroup    = new PhotoGroup($pageSlideshowId);

$photoGroupPhotos = $objPhotoGroup->photos;

if (!empty($photoGroupPhotos)) {

	$slidesView = '';

	foreach ($photoGroupPhotos as $i => $photo) {

		// CREATE SLIDE CAPTION

		$slideCaptionHeading = $photo['captionHeading'];
		$slideCaption        = $photo['caption'];
		$slidePhotoPath      = Helper::getFullUrl($photo['fullPath']);

		$bannerCaptionView = '<div class="banner__caption'.$bannerCaptionCls.'">';
		$bannerCaptionView .= $pageLogoView;
		$bannerCaptionView .= '<div class="banner__caption__inner">';
		

		if (!empty($slideCaptionHeading)) {

			$hrAnimationCls       = ($i > 0) ? ' hr--img--animated"' : '';
			$hrAnimationDelayAttr = ($i === 0) ? ' data-animation-delay="350"' : '';

			$bannerCaptionView .= '<p class="banner__caption__heading">
				<span class="banner__caption__heading-text">'.$slideCaptionHeading.'</span>
				<span class="hr hr--img hr--img--light'.$hrAnimationCls.'"'.$hrAnimationDelayAttr.'></span>
			</p>';
		}

		if (!empty($slideCaption)) {

			$bannerCaptionView .= '<p class="banner__caption__txt">'.$slideCaption.'</p>';
		}

		$bannerCaptionView .= '</div>';
		$bannerCaptionView .= '</div>';

		// CREATE SLIDE VIEW

		$slidesView .= '<div class="banner__slider__img" style="background-image: url('.$slidePhotoPath.');">
		'.$bannerCaptionView.'
		</div>';
	}
	
	$pageBannerView .= '<div class="banner'.$elmCls.'">
		<div class="banner__slider text-center" id="banner-slider">
			<div id="banner-slider-inner" class="banner__slider banner__slider__inner slider--fade">
				'.$slidesView.'
			</div>
		</div>
		'.$scrollBtn.'
		<div class="banner__grunge">
			<img src="'.$templateWideGrungeReversePath.'" />
		</div>
	</div>';

} else {

	include_once 'heroshot.php';

}

?>