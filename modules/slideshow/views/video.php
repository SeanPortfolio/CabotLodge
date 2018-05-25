<?php

	$bannerCaptionView = '<div class="banner__caption'.$bannerCaptionCls.'">';
	$bannerCaptionView .= $pageLogoView;
	$bannerCaptionView .= '<div class="banner__caption__inner">';
	
	
	if (!empty($pagePhotoCaptionHeading)) {

		$bannerCaptionView .= '<p class="banner__caption__heading">
			<span class="banner__caption__heading-text">'.$pagePhotoCaptionHeading.'</span>
			<span class="hr hr--img hr--img--light hr--img--animated" data-animation-delay="350"></span>
		</p>';
	}

	$bannerCaptionView .= '<p class="banner__caption__txt">'.$pagePhotoCaption.'</p>';

	$bannerCaptionView .= '</div>';
	$bannerCaptionView .= '</div>';

	$pageBannerView .= '<div class="banner banner--has-overlay'.$elmCls.' text-center">
		<div id="ytplayer" class="banner__video" data-autoplay="1" data-id="'.$pageVideoId.'"></div>
		'.$bannerCaptionView.'
		'.$scrollBtn.'
	</div>';

?>