<?php

require_once 'inc/vars.php';

if ($mainPageId == $impPageHome->id) {
	
	$logoBanner = '<img src="'.Helper::getFullUrl('/graphics/logo-full-white-2x.png').'" /><hr class="hr--white">';

	$scrollBtn = '<a href="#main" class="banner__scroll-to">
						<span class="hidden-xs hidden-sm"><i class="fa fa-angle-down"></i></span>
				  </a>';

	$elmCls .= ' banner--fs ';

}

$objMobileDetect = new MobileDetect();

$isMobileDevice  = ($objMobileDetect->isMobile() || $objMobileDetect->isTablet());

$browserIsIE = (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false));

// if (!empty($pageVideoId) && empty($browserIsIE) && !$browserIsIE && !$isMobileDevice) {
    
//     include_once 'views/video.php';

// } else 

if (!empty($pageVideoId) && empty($browserIsIE) && !$browserIsIE && !$isMobileDevice) {
    
    include_once 'views/video.php';

} else if (!empty($pageSlideshowId)) {
    
    include_once 'views/slider.php';

} else if (!empty($pagePhotoPath)) {

    include_once 'views/heroshot.php';

}

$templateTags['banner_view'] = $pageBannerView;

?>