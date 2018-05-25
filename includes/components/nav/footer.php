<?php

$currentPage   = $page;

function getFooterPages() {

    $sql = "SELECT gp.`id`,
        pmd.`footer_menu`, 
        pmd.`url`,
        pmd.`full_url`,
        pmd.`title`
        FROM `general_pages` gp

        LEFT JOIN `page_meta_data` pmd
            ON(gp.`page_meta_data_id` = pmd.`id`)

        WHERE pmd.`footer_menu` != ''
        AND pmd.`status` = '".FLAG_ACTIVE."'";


    $sql .= " ORDER BY pmd.`rank` ";

    $arrPages = fetchAll($sql);

    return $arrPages;

}

$footerNavView = '';


$arrFooterPages = getFooterPages();

if (!empty($arrFooterPages)) {

    $footerNavView  = '';
    foreach($arrFooterPages AS $footerPage){
        $footerItemCls      = ($footerPage['url'] === $currentPage) ? 'footer-navigation__item--active': '';
        $footerItemLabel    = $footerPage['footer_menu'];
        $footerItemTitle    = $footerPage['title'];
        $footerItemUrl      = $footerPage['full_url'];

        $footerItemUrl      = Helper::getFullUrl($footerItemUrl);
        
        
        $footerNavView .= '<li class="footer-navigation__item '.$footerItemCls.'">';
        $footerNavView .= '<a href="'.$footerItemUrl.'" title="'.$footerItemTitle.'" class="footer-navigation__link">'.$footerItemLabel.'</a>';
        $footerNavView .= '</li>';
    }

}


$templateTags['footer_nav'] = (!empty($footerNavView)) 
? '<ul class="footer-navigation">'.$footerNavView.'</ul>' 
: '';

?>