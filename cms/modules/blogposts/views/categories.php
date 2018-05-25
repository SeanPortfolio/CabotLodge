<?php
/** View for blog categories Tab */

$tabBlogCategoriesContent = '';
$categoryView             = '';


$arrPostCategories = fetchAll("SELECT bc.`id`, 
    pmd.`name`
  FROM `blog_category` bc
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bc.`page_meta_data_id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
  ORDER BY pmd.`name`");



if (!empty($arrPostCategories)) {

	$attPostCategories = fetchValue("SELECT GROUP_CONCAT(`category_id`)
    FROM `blog_post_has_category`
    WHERE `post_id` = '{$itemData['id']}'");

  $arrAttachedCategories = ( $attPostCategories ) ? explode(',', $attPostCategories) : array();

  foreach ($arrPostCategories as $category) {
    
    $categoryId       = $category['id'];

    $isAttached    = in_array($categoryId, $arrAttachedCategories);
    
    $isChecked     = ( $isAttached ) ? ' checked="checked"' : '';
    
    $categoryView .= '<li class="itemsel">
        <label class="checkbox-inline sel">
          <input class="do-sel" type="checkbox" name="category_id[]" value="'.$categoryId.'"'.$isChecked.'> '
            .$category['name'].'
        </label>
      </li>';

  }

  $tabBlogCategoriesContent = '<p>
      <strong>Choose quicklinks to display on page</strong>
    </p>
    <ul class="selection-box padded">
      '.$categoryView.'
    </ul>';
}

?>