<?php

$quicklinksView = '';
$sqlQuicklinks  = '';
$arrQuicklinks  = array();

$sqlQuicklinks = "SELECT IF((pmd.`quicklink_heading` != ''), pmd.`quicklink_heading`, pmd.`menu_label`) AS label, 
	  pmd.`full_url` AS fullURL, 
	  pmd.`quicklink_photo_path` AS photo
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

$totalQuicklinks = count($arrQuicklinks);

$extraTitle = $mainPageId == $impPageHome->id ? 'Experience ' : ''; 

foreach ($arrQuicklinks as $quicklink) {
	
	$qlHeading   = $quicklink['label'];
	$qlFullURL     = Helper::getFullUrl($quicklink['fullURL']);
	$qlPhotoPath   = Helper::getFullUrl($quicklink['photo']);

    $quicklinkWidth = ($totalQuicklinks == 2) ? 'grid-ql-half-count' : 'grid-ql-default-count';    

    $quicklinkItems .= '<li class="grid-ql__list--item '.$quicklinkWidth.'">    
    <a href="'.$qlFullURL.'"><div class="grid-ql__img zoom grid-ql_img--photo" style="background-image: url('.$qlPhotoPath.')">
    <span class="grid-ql--grunge">
        <img src="'.$grungeSmallPath.'">
    </span>
    <div class="grid-ql__img--label">
        '.$extraTitle.$qlHeading.'
    </div>
    </div></a>
</li>';

}

$quicklinksView = '<section class="section grid-ql">
		<div class="container">
			<div class="row">
                <ul class="grid-ql__list">    
                    '.$quicklinkItems.'
                </ul>
			</div>
		</div>
	</section>';

$templateTags['quicklinks_view'] = $quicklinksView;
	
}

?>