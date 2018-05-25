<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;

  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sqlTableData = "SELECT a.`id`, 
        a.`page_meta_data_id`,
        pmd.`name`,
        pmd.`heading`,
        pmd.`status`, 
        pmd.`rank`, 
        DATE_FORMAT(pmd.`date_created`, '%d %b %Y %h:%i %p') AS created_date, 
        DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
        DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date
    FROM `accommodation` AS `a`
    LEFT JOIN `page_meta_data` pmd
        ON(a.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, pmd.`rank`";

  $arrTableData = fetchAll($sqlTableData);

  if (!empty($arrTableData)) {
    
    foreach ($arrTableData as $rowItem) {

      $itemId            = $rowItem['id'];
      $itemMetaDataId    = $rowItem['page_meta_data_id'];
      $itemLabel         = $rowItem['name'];
      $itemHeading       = $rowItem['heading'];
      $itemStatus        = $rowItem['status'];
      $itemDateUpdated   = $rowItem['updated_date'];
      $itemDateDeleted   = $rowItem['deleted_date'];
      $itemRank          = $rowItem['rank'];

      $itemLabel = (($itemLabel) ? $itemLabel : ((!empty($itemHeading)) ? $itemHeading : 'Untitled-'.$itemId ));

      if ($itemStatus == FLAG_ACTIVE) {
  
        $itemStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($itemStatus == FLAG_HIDDEN) {
  
        $itemStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $itemStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
          class ="checkall" value="'.$itemMetaDataId.'"><span></span>
        </label>';

      $itemDate = ($listType == FLAG_DELETED) ? $itemDateDeleted : $itemDateUpdated;

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
          <td>
          <input type="text" name="item_rank['.$itemMetaDataId.']" value="'.$itemRank.'" 
           title="Rank for '.$categoryLabel.'"
           class="input--rank">
            <a href="'.ADMIN_BASE_URL.'/?do='.$do
              .'&action=edit&id='.$itemId.'" 
              title="Edit the '.$itemLabel.' page">'.$itemLabel.'</a>
          </td>
          <td width="200">'.$itemDate.'</td>
          <td width="100" align="center">'.$itemStatus.'</td>
        </tr>';
    }
  
  } else {

    $tableRows .= '<tr>
      <td colspan="5" align="center" class="no-data">No Accommodation available.</td>
    </tr>';

  }

  return $tableRows;

}

?>