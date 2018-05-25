<?php

/** Get list of category which has active posts */
$sidebarItemsView = '';

$csvCategoryIds = fetchValue("SELECT GROUP_CONCAT(DISTINCT(bphc.`category_id`))
		FROM `blog_post_has_category` bphc
		LEFT JOIN `blog_post` bp
			ON(bp.`id` = bphc.`post_id`)
	  LEFT JOIN `page_meta_data` pmd
	    ON(pmd.`id` = bp.`page_meta_data_id`)
	  WHERE pmd.`status` != '".FLAG_DELETED."'");

$arrCategoryIds = explode($delimiter, $csvCategoryIds);
$arrCategoryIds = array_unique(array_filter($arrCategoryIds));
$arrCategoryIds = (empty($arrCategoryIds)) ? array() : $arrCategoryIds;

$sqlCategoryListExtra .= ( !empty($arrCategoryIds) ) ? "AND bc.`id` IN(".implode($delimiter, $arrCategoryIds).")" : '';

/** Get category data */
$sqlCategoryList = "SELECT pmd.`menu_label`, 
    pmd.`url`,
    pmd.`full_url` AS fullURL, 
    pmd.`title`
  FROM `blog_category` bc
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bc.`page_meta_data_id`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`menu_label` != ''
    {$sqlCategoryListExtra}
  ORDER BY pmd.`rank`";

$arrCategoryList = fetchAll($sqlCategoryList);

if (!empty($arrCategoryList)) {

	foreach ($arrCategoryList as $categoryItem) {
    
    $itemLabel   = $categoryItem['menu_label'];
    $itemTitle   = $categoryItem['title'];
    $itemFullURL = Helper::getFullUrl($blogPageFullURL.'/category/'.$categoryItem['url']);

		
    $sidebarItemsView .= '<li class="sidebar-list__item">
        <a href="'.$itemFullURL.'" title="'.$itemTitle.'"
         class="sidebar-list__item__link">'.$itemLabel.'</a>
      </li>';
	}

	$sidebarItemsView = '<div class="sidebar">
			<h3 class="sidebar-heading">Categories</h3>
			<ul class="sidebar-list">
				'.$sidebarItemsView.'
			</ul>
		</div>';

	$blogSidebarPanelView .= $sidebarItemsView;
}


?>