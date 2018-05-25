<?php

$currentPage   = $page;
function getPages($parentId = null) {

  $navPagesSql = "SELECT gp.`id`,
      gp.`parent_id`,
      pmd.`menu_label`, 
      pmd.`url`,
      pmd.`full_url`,
      pmd.`title`,
      (SELECT GROUP_CONCAT(`mod_id`) 
       FROM `module_pages` 
       WHERE `page_id` = gp.`id`) AS page_mods
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
      ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`menu_label` IS NOT NULL
      AND pmd.`status` = '".FLAG_ACTIVE."'
      AND gp.`parent_id` ".((is_null($parentId)) ? " IS NULL" : " = {$parentId}")."
    ORDER BY pmd.`rank` ";

  $arrPages = fetchAll($navPagesSql);

  return $arrPages;

}

$navigationView = '';

$arrPages = getPages();

if (!empty($arrPages)) {

  foreach ($arrPages as $menuPage) {

    $menuPageId       = $menuPage['id'];
    $menuParentPageId = $menuPage['parent_id'];
    $menuItemCls      = ($menuPage['url'] === $currentPage) ? 'primary-navigation__item--active': '';
    $menuItemLabel    = $menuPage['menu_label'];
    $menuItemTitle    = $menuPage['title'];
    $menuItemUrl      = $menuPage['full_url'];

    $arrPageModules   = explode(',', $menuPage['page_mods']);    

    $menuItemUrl      = Helper::getFullUrl($menuItemUrl);
    
    $arrChildPages    = getPages( $menuPageId );
    /*
    $subNavigation = '';
    
    if ($impPageAccommodation->id == $menuPageId) {
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
              $accommItemCls      = ($accommPage['url'] === $currentPage) ? 'sub-navigation__item--active': '';
              $accommItemLabel    = $accommPage['menu_label'];
              $accommItemTitle    = $accommPage['title'];
              $accommItemUrl      = $menuItemUrl.$accommPage['full_url'];

              $subNavigation .= '<li class="sub-navigation__item '.$accommItemCls.'">';
              $subNavigation .= '<a href="'.$accommItemUrl.'" title="'.$accommItemTitle.'">'.$accommItemLabel.'</a>';
              $subNavigation .= '</li>';
          }       
       }
    }

    if(!empty($arrChildPages)) {

      foreach ($arrChildPages as $childPage) {

        $childPageId       = $childPage['id'];
        $childItemCls      = ($childPage['url'] === $currentPage) ? 'sub-navigation__item--active': '';
        $childItemLabel    = $childPage['menu_label'];
        $childItemTitle    = $childPage['title'];
        $childItemUrl      = $childPage['full_url'];

        $childItemUrl      = Helper::getFullUrl($childItemUrl);

        $subNavigation .= '<li class="sub-navigation__item '.$childItemCls.'">';
        $subNavigation .= '<a href="'.$childItemUrl.'" title="'.$childItemTitle.'">'.$childItemLabel.'</a>';
        $subNavigation .= '</li>';

      }
    } */

    $navigationView  .= '';
    $navigationView .= '<li class="primary-navigation__item '.$menuItemCls.'">';
    $navigationView .= '<a href="'.$menuItemUrl.'" title="'.$menuItemTitle.'" class="primary-navigation__item--link">'.
    $menuItemLabel.'</a>';
    // $navigationView .= (!empty($subNavigation)) ? '<i class="fa fa-chevron-up sub-nav-trigger"></i>
    // <ul class="sub-navigation '.$listCls.'">'.$subNavigation.'</ul>' : '';
    $navigationView .= '</li>';
  }    
}

$templateTags['header_nav'] = (!empty($navigationView)) 
                              ? '<ul class="primary-navigation">'.$navigationView.'</ul>' 
                              : '';
?>