<?php
/** Generate item table list */

function generateTable($activePages,$parentPageId = null)
{
  global $generation, $id, $do, $listType;

  $exParentId = ((!empty($parentPageId)) ? " = '{$parentPageId}'" : " IS NULL");

  $sqlExtra = ($listType == FLAG_DELETED) 
            ? "pmd.`status` = '".FLAG_DELETED."'"
            : "pmd.`status` != '".FLAG_DELETED."'";

 $sqlPages = "SELECT
    gp.`id`,
    pmd.`id` AS meta_data_id,
    pmd.`name`,
    pmd.`status`,
    pmd.`title`,
    pmd.`url`,
    pmd.`rank`,
    pmd.`is_locked`,
    DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %r') AS updated_date,
    DATE_FORMAT(pmd.`date_deleted`, '%d %b %Y %r') AS deleted_date,
    pmd.`updated_by`,
    gp.`parent_id`
  FROM
    `general_pages` gp
  LEFT JOIN `page_meta_data` pmd ON
    (gp.`page_meta_data_id` = pmd.`id`)
  WHERE {$sqlExtra}
    AND gp.`parent_id`".$exParentId."
  ORDER BY pmd.`status`, pmd.`rank`";
  
  $result = runQuery($sqlPages);

  $generation++;
  $indentation = '';
  
  for ($i=1; $i<$generation; $i++) { 
    
    $indentation = $indentation + 48; 
  
  }

  $arrImportantPages = array();
  
  $csvImportantPages = fetchValue("SELECT GROUP_CONCAT(DISTINCT `page_id`) 
    FROM `general_importantpages` 
    WHERE `page_id` != '0'");

  if ($csvImportantPages) {
    
    $arrImportantPages = explode(',', $csvImportantPages);
  
  }

  while($row = mysql_fetch_assoc($result))
  {
    $pageId          = $row['id'];
    $pageParentInd   = $row['parent_id'];
    $pageTitle       = $row['title'];
    $pageLabel       = $row['name'];
    $pageRank        = $row['rank'];
    $pageStatus      = $row['status'];
    $pageUrl         = $row['page_url'];
    $pageDateUpdated = $row['updated_date'];
    $pageDateDeleted = $row['deleted_date'];
    $pageIsLocked    = $row['is_locked'];
    $pageMetaDataId  = $row['meta_data_id'];

    $pageLabel = ($pageLabel) ? $pageLabel : 'Untitled';

    $itemSelect = '<label class="custom-check">
        <input type="checkbox" name="item_select[]"
         class ="checkall" value="'.$pageMetaDataId.'"><span></span>
      </label>';

    if ($pageIsLocked || in_array($pageId, $arrImportantPages)) {

      $itemSelect = '<i class="glyphicon glyphicon-lock row-locked"
        title="This page is always locked and can not be hidden "></i>';
    
    }

    if ($pageStatus == FLAG_ACTIVE) {

      $pageStatus = '<span class="label label-success">Published</span>';

    } elseif ($pageStatus == FLAG_HIDDEN) {

      $pageStatus = '<span class="label label-warning">Hidden</span>';

    } else {

      $pageStatus = '<span class="label label-danger">Deleted</span>';

    }
      
    $itemDate = ($listType == FLAG_DELETED) 
              ? $pageDateDeleted 
              : $pageDateUpdated;

    $activePages .= '<tr>
        <td width="20" align="center">'.$itemSelect.'</td>
        <td style="padding-left:'.$indentation.';">
        <input type="hidden" name="page_id[]" value="'.$pageMetaDataId.'">
        <input type="text" name="page_rank[]" value="'.$pageRank.'" 
         title="Page Rank for '.$pageLabel.'" 
         style="margin-left:'.$indentation.'px;"
         class="input--rank">
          <a href="'.ADMIN_BASE_URL.'/?do='.$do
           .'&action=edit&id='.$pageId.'" 
           title="Edit the '.$pageLabel.' page">'.$pageLabel.'</a>
        </td>
        <td width="200">'.$itemDate.'</td>
        <td width="100" align="center">'.$pageStatus.'</td>
      </tr>';

    /** 
     * Get all of the children of this page.
     * put the $disabled parameter to make sure that 
     * this page can not be selected, 
     * then all of its childeren should not be able to be selected.
     */
    $activePages = generateTable($activePages,$pageId);
    
    /** 
     * Reset the disabled variable to 'enabled' (effectively) 
     * so that all of the siblings of this page CAN be selected
     */
    $disabled = '';
  }

  $generation--;
  
  return $activePages;
}

?>