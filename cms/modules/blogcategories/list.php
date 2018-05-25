<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;

  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sqlBlogCategories = "SELECT bc.`id`, 
        bc.`page_meta_data_id`,
        pmd.`name`, 
        pmd.`status`, 
        pmd.`rank`,
        DATE_FORMAT(pmd.`date_created`, '%d %M %Y %h:%i %p') AS created_date, 
        DATE_FORMAT(pmd.`date_updated`, '%d %M %Y %h:%i %p') AS updated_date,
        DATE_FORMAT(pmd.`date_deleted`, '%d %b %Y %r') AS deleted_date
    FROM `blog_category` bc
    LEFT JOIN `page_meta_data` pmd
        ON(pmd.`id` = bc.`page_meta_data_id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, pmd.`rank`";

  $arrBlogCategories = fetchAll($sqlBlogCategories);

  if(!empty($arrBlogCategories)) {
    
    foreach ($arrBlogCategories as $blogCategory) {

      $categoryId          = $blogCategory['id'];
      $categoryMetaDataId  = $blogCategory['page_meta_data_id'];
      $categoryLabel       = $blogCategory['name'];
      $categoryStatus      = $blogCategory['status'];
      $categoryDateCreated = $blogCategory['created_date'];
      $categoryDateUpdated = $blogCategory['updated_date'];
      $categoryDateDeleted = $blogCategory['deleted_date'];
      $categoryRank        = $blogCategory['rank'];

      $categoryLabel = ($categoryLabel) ? $categoryLabel : 'Untitled-'.$categoryId ;

      if ($categoryStatus == FLAG_ACTIVE) {
  
        $categoryStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($categoryStatus == FLAG_HIDDEN) {
  
        $categoryStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $categoryStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
          class ="checkall" value="'.$categoryMetaDataId.'"><span></span>
        </label>';

      $itemDate = ($listType == FLAG_DELETED) ? $categoryDateDeleted : $categoryDateUpdated;

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
          <td>
            <input type="text" name="item_rank['.$categoryMetaDataId.']" value="'.$categoryRank.'" 
             title="Blog category rank for '.$categoryLabel.'"
             class="input--rank">
              <a href="'.ADMIN_BASE_URL.'/?do='.$do
              .'&action=edit&id='.$categoryId.'" 
              title="Edit the '.$categoryLabel.' page">'.$categoryLabel.'</a>
          </td>
          <td width="200">'.$itemDate.'</td>
          <td width="100" align="center">'.$categoryStatus.'</td>
        </tr>';
    }
  
  } else {

    $tableRows .= '<tr>
      <td colspan="4" align="center" class="no-data">No blog categories available.</td>
    </tr>';

  }

  return $tableRows;

}

?>