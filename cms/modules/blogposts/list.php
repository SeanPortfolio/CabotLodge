<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;

  $sqlExtra = ($listType == FLAG_DELETED) ? "pmd.`status` = '".FLAG_DELETED."'" : "pmd.`status` != '".FLAG_DELETED."'";

  $sqlBlog = "SELECT bp.`id`, 
        bp.`page_meta_data_id`,
        pmd.`heading`,
        pmd.`status`, 
        DATE_FORMAT(pmd.`date_created`, '%d %b %Y %h:%i %p') AS created_date, 
        DATE_FORMAT(pmd.`date_updated`, '%d %b %Y %h:%i %p') AS updated_date,
        DATE_FORMAT(pmd.`date_deleted`, '%d %M %Y %h:%i %p') AS deleted_date,
        IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%d %b %Y'), '' ) AS `posted_date`
    FROM 
        `blog_post` AS `bp`
    LEFT JOIN `page_meta_data` pmd
        ON(bp.`page_meta_data_id` = pmd.`id`)
    WHERE {$sqlExtra}
    ORDER BY pmd.`status`, bp.`date_posted` DESC";

  $arrBlog = fetchAll($sqlBlog);

  if(!empty($arrBlog)) {
    
    foreach ($arrBlog as $blog) {

      $blogId          = $blog['id'];
      $blogMetaDataId  = $blog['page_meta_data_id'];
      $blogLabel       = $blog['heading'];
      $blogStatus      = $blog['status'];
      $blogDatePosted  = $blog['posted_date'];
      $blogDateUpdated = $blog['updated_date'];
      $blogDateDeleted = $blog['deleted_date'];
      $blogRank        = $blog['rank'];

      $blogLabel = ($blogLabel) ? $blogLabel : 'Untitled-'.$blogId ;

      $blogDatePosted = (!empty($blogDatePosted)) ? $blogDatePosted : '-';

      if ($blogStatus == FLAG_ACTIVE) {
  
        $blogStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($blogStatus == FLAG_HIDDEN) {
  
        $blogStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $blogStatus = '<span class="label label-danger">Deleted</span>';
  
      }

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
          class ="checkall" value="'.$blogMetaDataId.'"><span></span>
        </label>';

      $itemDate = ($listType == FLAG_DELETED) ? $blogDateDeleted : $blogDateUpdated;

      $tableRows .= '<td width="20" align="center">'.$itemSelect.'</td>
          <td>
            <a href="'.ADMIN_BASE_URL.'/?do='.$do
              .'&action=edit&id='.$blogId.'" 
              title="Edit the '.$blogLabel.' page">'.$blogLabel.'</a>
          </td>
          <td width="200">'.$blogDatePosted.'</td>
          <td width="200">'.$itemDate.'</td>
          <td width="100" align="center">'.$blogStatus.'</td>
        </tr>';
    }
  
  } else {

    $tableRows .= '<tr>
      <td colspan="5" align="center" class="no-data">No blog posts available.</td>
    </tr>';

  }

  return $tableRows;

}

?>