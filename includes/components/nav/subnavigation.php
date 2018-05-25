<?php

$navigationId = $pageParentId ? $pageParentId : $mainPageId;

$arrSubNavPages    = getPages( $navigationId );

$subNavigation = '';

if ($impPageAccommodation->id == $mainPageId) {

    $accommodationQuery = "SELECT a.`id`,
    pmd.`menu_label`,
    pmd.`title`,
    pmd.`full_url`,
    pmd.`url`
    FROM `accommodation` a
    LEFT JOIN `page_meta_data` pmd
    ON(a.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`menu_label` != ''
    ORDER BY pmd.`rank`";
    
    $arrAccommodation = fetchAll($accommodationQuery);
    
    if ($arrAccommodation) {
        foreach ($arrAccommodation as $accommPage) {

            $accommPageId       = $accommPage['id'];
            $accommItemCls      = ($accommPage['url'] === $segment1) ? 'sub-navigation__item--active': '';
            $accommItemLabel    = $accommPage['menu_label'];
            $accommItemTitle    = $accommPage['title'];
            $accommItemUrl      = $impPageAccommodation->full_url.$accommPage['full_url'];
            
            $subNavigation .= '<li class="sub_navigation__item '.$accommItemCls.'">';
            $subNavigation .= '<a href="'.$accommItemUrl.'" title="'.$accommItemTitle.'" class="sub_navigation__link">'.$accommItemLabel.'</a>';
            $subNavigation .= '</li>';

        }       
    }
}

if (!empty($arrSubNavPages)) {
    
    foreach ($arrSubNavPages as $subChildPage) {
        
        $childPageId       = $subChildPage['id'];
        $childItemCls      = ($subChildPage['url'] === $pageUrl) ? 'sub-navigation__item--active': '';
        $childItemLabel    = $subChildPage['menu_label'];
        $childItemTitle    = $subChildPage['title'];
        $childItemUrl      = $subChildPage['full_url'];
        
        $childItemUrl      = Helper::getFullUrl($childItemUrl);
        
        $subNavigation .= '<li class="sub_navigation__item '.$childItemCls.'">';
        $subNavigation .= '<a href="'.$childItemUrl.'" title="'.$childItemTitle.'" class="sub_navigation__link">'.$childItemLabel.'</a>';
        $subNavigation .= '</li>';
        
    }
}

$templateTags['sub_nav'] = (!empty($subNavigation)) 
                            ? '<div class="sub_navigation__wrapper">
                                 <div class="container">
                                   <div class="row text-center">
                                     <nav class="sub_navigation__nav">
                                        <ul class="sub_navigation">'.$subNavigation.'</ul>
                                     </nav>
                                   </div>
                                 </div>
                               </div>' 
                               : '';
?>