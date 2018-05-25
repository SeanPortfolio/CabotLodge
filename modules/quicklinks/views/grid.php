<?php
##------------------------------------------------------------------------------------------------------
## QUICKLINKS Horizontal Grid View

$quicklinkItems = '';

foreach ($arrQuicklinks as $quicklink) {
	
	$qlHeading   = $quicklink['label'];
	$qlDetails   = $quicklink['details'];

	$ending     = '...';
	$qlDetails = nl2br($qlDetails);
	$qlDetails = strTruncate($qlDetails, 130, $ending, true, true);

	$qlFullURL     = Helper::getFullUrl($quicklink['fullURL']);
	$qlPhotoPath   = Helper::getFullUrl($quicklink['photo']);
	$qlButtonLabel = $quicklink['button_label'];

	$qlButtonLabel = (!empty($qlButtonLabel)) ? $qlButtonLabel : 'Discover More' ;

	$quicklinkItems .= '<div class="col-md-4 grid-col">
				<div class="grid-col__inner">
						<div class="grid-col__img">
							<a href="'.$qlFullURL.'" class="">
								<span class="zoom" style="background-image: url('.$qlPhotoPath.')"></span>
							</a>
						</div>
						<div class="grid-col__content text-center">
							<h3 class="grid-col__heading section__heading--yellow specials__heading">
								<a href="'.$qlFullURL.'" title="'.$qlHeading.'">'.$qlHeading.'</a>
							</h3>
							<p>'.$qlDetails.'</p>
							<a href="'.$qlFullURL.'" class="btn">'.$qlButtonLabel.'</a>
						</div>
				</div>   
		</div>';
}

$quicklinksView = '<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					'.$quicklinkItems.'
				</div>
			</div>
		</div>
	</section>';

$templateTags['quicklinks_view'] = $quicklinksView;

?>