<?php

$sidebarItemsView = '';

$arrPostsList = fetchAll("SELECT pmd.`heading`, 
		pmd.`url`,
		pmd.`full_url` AS fullURL, 
		pmd.`title`
	FROM `blog_post` bp
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bp.`page_meta_data_id`)
	WHERE pmd.`status` = '".FLAG_ACTIVE."'
		AND bp.`date_posted` != ''
	ORDER BY bp.`date_posted` DESC
	LIMIT 10");


if (!empty($arrPostsList)) {

	foreach ($arrPostsList as $postItem) {

    $itemLabel   = $postItem['heading'];
    $itemTitle   = $postItem['title'];
    $itemFullURL = Helper::getFullUrl($blogPageFullURL.'/post/'.$postItem['url']);

		
    $sidebarItemsView .= '<li class="sidebar-list__item">
        <a href="'.$itemFullURL.'" title="'.$itemTitle.'"
         class="sidebar-list__item__link">'.$itemLabel.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h3 class="sidebar-heading">Recent Posts</h3>
			<ul class="sidebar-list">
				'.$sidebarItemsView.'
			</ul>
		</div>';
	
	$blogSidebarPanelView .= $sidebarItemsView;
}


?>