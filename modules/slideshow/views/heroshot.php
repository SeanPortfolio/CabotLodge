<?php

if (Helper::isFile($pagePhotoPath)) {

	$pagePhotoPath      = Helper::getFullUrl($pagePhotoPath);

	$bannerCaptionView = '<div class="banner__caption'.$bannerCaptionCls.'">';
	$bannerCaptionView .= $pageLogoView;
	$bannerCaptionView .= '<div class="banner__caption__inner">';
	

	if (!empty($pagePhotoCaptionHeading) && $mainPageId == $impPageHome->id) {

		$bannerCaptionView .= '<div class="banner__caption__heading">
			<span class="banner__caption__heading-text text-uppercase">'.$homepageHeroCaption.'</span>	
			<p class="text-center banner__logo-banner">'.$logoBanner.'</p>
			<span class="hr hr--img hr--img--light hr--img--animated" data-animation-delay="350"></span>
		</div>';
	} 

	if (!empty($pagePhotoCaptionHeading) && $mainPageId !== $impPageHome->id) {

		$bannerCaptionView .= '<div class="banner__caption__heading">
		    <p class="text-center">'.$pagePhotoCaptionHeading.'</p>
			<span class="hr hr--img hr--img--light hr--img--animated" data-animation-delay="350"></span>
		</div>';
	} 


	$bannerCaptionView .= '<p class="banner__caption__txt">'.$pagePhotoCaption.'</p>';

	$bannerCaptionView .= '</div>';
	$bannerCaptionView .= '</div>';
	
	$pageBannerView .= '<div class="banner banner--has-bg banner--has-overlay'.$elmCls.' text-center" style="background:url('.$pagePhotoPath.');">
		'.$bannerCaptionView.'
		'.$scrollBtn.'
		<div class="banner__overlay"></div>
	</div>
	<div class="banner__grunge--heroshot">
		<img src="'.$templateWideGrungeReversePath.'" />
	</div>
	';

}

?>