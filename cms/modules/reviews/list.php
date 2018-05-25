<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;

  $sqlExtra = ($listType == FLAG_DELETED) ? "r.`status` = '".FLAG_DELETED."'" : "r.`status` != '".FLAG_DELETED."'";

  $sqlReviews = "SELECT r.`id`, 
      r.`person_name`, 
      r.`person_location`, 
      r.`status`,
      DATE_FORMAT(r.`date_posted`, '%d %b %Y') AS posted_on, 
      r.`rank`
    FROM `review` r
    WHERE {$sqlExtra}
    ORDER BY `status`, `rank`";
  
  $arrReviews = fetchAll($sqlReviews);

  if(!empty($arrReviews)) {
    
    foreach ($arrReviews as $review) {

      $reviewId         = $review['id'];
      $reviewPersonName = $review['person_name'];
      $reviewLocation   = $review['person_location'];
      $reviewStatus     = $review['status'];
      $reviewDate       = $review['posted_on'];
      $reviewRank       = $review['rank'];
  
      $reviewLabel = ($reviewPersonName) 
        ? $reviewPersonName.(($reviewLocation) ? ", {$reviewLocation}" : '') 
        : 'Untitled';

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$reviewId.'"><span></span>
        </label>';
    
      if ($reviewStatus == FLAG_ACTIVE) {
  
        $reviewStatus = '<span class="label label-success">Published</span>';
  
      } elseif ($reviewStatus == FLAG_HIDDEN) {
  
        $reviewStatus = '<span class="label label-warning">Hidden</span>';
  
      } else {
  
        $reviewStatus = '<span class="label label-danger">Deleted</span>';
  
      }
  
      $rowReviews .= '<tr>
        <td width="20" align="center">'.$itemSelect.'</td>
        <td>
          <input type="text" name="item_rank['.$reviewId.']" value="'.$reviewRank.'" 
           title="Review Rank for '.$reviewLabel.'"
           class="input--rank">
            <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$reviewId.'" 
            title="Edit the '.$reviewLabel.' page">'.$reviewLabel.'</a>
        </td>
        <td width="200">'.$reviewDate.'</td>
        <td width="100" align="center">'.$reviewStatus.'</td>
        </tr>';
    }

  } else {

    $rowReviews .= '<tr>
      <td colspan="4" align="center" class="no-data">No reviews available.</td>
    </tr>';

  }

  return $rowReviews;
}
?>