<?php

$quicklinksView = '';
$sqlQuicklinks  = '';
$arrQuicklinks  = array();

$sqlQuicklinks = "SELECT IF((pmd.`quicklink_heading` != ''), pmd.`quicklink_heading`, pmd.`menu_label`) AS label, 
	  pmd.`full_url` AS fullURL, 
	  pmd.`quicklink_description` AS details,
	  pmd.`quicklink_photo_path` AS photo,
		pmd.`quicklink_button_text` AS button_label
	FROM `general_pages` gp 
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = gp.`page_meta_data_id`)
	LEFT JOIN `page_has_quicklink` phq
		ON(phq.`quicklink_page_id` = gp.`id`)
	WHERE pmd.`status` = 'A'
		AND phq.`page_id` = '{$mainPageId}'
		AND pmd.`quicklink_photo_path` != ''
	ORDER BY phq.`rank` ASC";

$arrQuicklinks = fetchAll($sqlQuicklinks);

if (!empty($arrQuicklinks)) {

	$quicklinkItems = '';

$qlCount = 0;
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

    $qlImage = '<div class="grid-row__img">
    <span class="grid-row--grunge">
        <img src="'.$grungeSmallPath.'">
    </span>
    <a href="'.$qlFullURL.'" class="">
        <span class="zoom grid-col_img--photo" style="background-image: url('.$qlPhotoPath.')"></span>
    </a>
</div>';

    $qlContent = '<div class="grid-row__content text-left">
    <h3 class="grid-row__heading section__heading--yellow specials__heading">
        <a href="'.$qlFullURL.'" title="'.$qlHeading.'">'.$qlHeading.'</a>
    </h3>
    <p>'.$qlDetails.'</p>
    <a href="'.$qlFullURL.'" class="btn btn--transparent-ghost">'.$qlButtonLabel.'</a>
</div>';

    $qlLeft  = $qlContent;
    $qlright = $qlImage;
    if ($qlCount++ % 2 == 0) {
        $qlLeft  = $qlImage;
        $qlright = $qlContent;
    }

	$quicklinkItems .= '<div class="col-md-12 grid-row">
                <div class="grid-row__inner">
                        <div class="col-xs-12 col-md-6">
                            '.$qlLeft.'
                        </div>
                        <div class="col-xs-12 col-md-6">
                            '.$qlright.'
                        </div>
                        <hr class="grid-row--hr" />
				</div>   
		</div>';
}

$quicklinksView = '<section class="section">
		<div class="container">
			<div class="row">
					'.$quicklinkItems.'
			</div>
		</div>
	</section>';

$templateTags['quicklinks_view'] = $quicklinksView;
	
}

?>