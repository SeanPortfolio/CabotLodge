<?php 
/** Get list of archive posts*/

$sidebarItemsView = '';

$arrPostDateRange = fetchAll("SELECT 
		DISTINCT DATE_FORMAT(bp.`date_posted`, '%M %Y') AS mon, 
		YEAR(bp.`date_posted`) AS dateYear,
		LPAD(MONTH(bp.`date_posted`), 2, '0') AS dateMonth
	FROM `blog_post` bp 
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bp.`page_meta_data_id`)
	WHERE pmd.`status` = '".FLAG_ACTIVE."'
	ORDER BY bp.`date_posted` DESC");

if (!empty($arrPostDateRange)) {
	
	foreach ($arrPostDateRange as $item) {

    $itemYear       = $item['dateYear'];
    $itemMonth      = $item['dateMonth'];
    $itemMonthLable = $item['mon'];

		$itemFullURL   = Helper::getFullUrl($blogPageFullURL.'/archive/'.$itemYear.'/'.$itemMonth);

    $sidebarItemsView .= '<li class="sidebar-list__item">
        <a href="'.$itemFullURL.'" title="'.$itemMonthLable.'"
         class="sidebar-list__item__link">'.$itemMonthLable.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h3 class="sidebar-heading">Archives</h3>
			<ul class="sidebar-list">
				'.$sidebarItemsView.'
			</ul>
		</div>';
	
	$blogSidebarPanelView .= $sidebarItemsView;
	
}

?>