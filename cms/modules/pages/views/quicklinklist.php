<?php

/** QuickLinks tab content */

$tabQuicklinkListContent .= '<p><strong>Choose quicklinks to display on page</strong></p>';

$qlSql = "SELECT gp.`id`, 
  pmd.`quicklink_heading`,
  pmd.`name`
  FROM `general_pages` gp
  LEFT JOIN `page_meta_data` pmd
    ON(gp.`page_meta_data_id` = pmd.`id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
    AND gp.`id` != '{$id}'
  ORDER BY pmd.`rank`";

$quicklinks = fetchAll($qlSql);

if (!empty($quicklinks)) {

  $selectedQuicklinks = fetchAll("SELECT `quicklink_page_id`, 
      `type`, 
      `rank` 
    FROM `page_has_quicklink` 
    WHERE `page_id` = '{$id}'");

  $arrSelectedQuicklinks = array(
    'primary' => array(),
    'secondary' => array()
  );

  if (!empty($selectedQuicklinks)) { 

    foreach ($selectedQuicklinks as $selectedQuicklink) {

      $key = ($selectedQuicklink['type'] == 'P') ? 'primary' : 'secondary';

      $qlPageId = $selectedQuicklink['quicklink_page_id'];

      $arrSelectedQuicklinks[$key][$qlPageId] = $selectedQuicklink['rank'];

    }
  }
  
  $primaryQuicklinks    = $arrSelectedQuicklinks['primary'];
  
  $primaryQuicklinksIds = array_keys($primaryQuicklinks);

  // CREATE QUICKLINKS VIEW
  $tabQuicklinkListContent .= '<ul class="selection-box padded">';

  foreach ($quicklinks as $quicklink) { 

    $quicklinkId        = $quicklink['id'];
    $qlLabel            = $quicklink['name'];
    $qlPrimaryIsChecked = (in_array($quicklinkId, $primaryQuicklinksIds)) 
                          ? ' checked="checked"' 
                          : '';
    $qlPrimaryRank      = ($qlPrimaryIsChecked) 
                          ? $primaryQuicklinks[$quicklinkId] 
                          : '';

    $tabQuicklinkListContent .= '<li class="itemsel sel-rank">
      <input type="number" class="input-sm rank" min="1" placeholder="Rank" name="quicklink_rank['.$quicklinkId.']" 
       value="'.$qlPrimaryRank.'">
      <label class="checkbox-inline sel">
        <input'.$qlPrimaryIsChecked.' type="checkbox" class="do-sel"
         value="'.$quicklinkId.'" name="quicklink_id[]"> 
          <span>'.$qlLabel.'</span>        
      </label>
    </li>';

  }
  
  $tabQuicklinkListContent .= '</ul>';
}


?>