<?php

/** Modules tab content */

$sqlModules = "SELECT m.`mod_id`, 
  m.`mod_name`,
  (SELECT `modpages_rank` 
    FROM `module_pages`
    WHERE `page_id` = '{$id}' 
      AND `mod_id` = m.`mod_id` 
    LIMIT 1
  ) AS mod_rank
  FROM `modules` m
  WHERE mod_showincms = '".FLAG_YES."'
  ORDER BY m.`mod_name`";

$result = runQuery($sqlModules);

$modules = "";

while ($row = mysql_fetch_assoc($result)) {

  $modId       = $row['mod_id'];
  $modName     = $row['mod_name'];
  $modPageRank = $row['mod_rank'];

  $isSelected = ($modPageRank != "") ? ' checked="checked"' : '';

  $modules .= '<div class="md-row">
      <input type="hidden" name="mod_id[]" value="'.$modId.'" '.$isSelected.'>
      <label>
        <input type="text" name="mp_rank[]" 
         class="input-text" style="width:35px;" 
         value="'.$modPageRank.'">&nbsp;'.$modName.'
      </label>
    </div>';

}

$tabModulesContent = '<p>
    <strong>
      Select the modules you would like included on this page by entering 
      a rank number for each (Leave those you don\'t want)
    </strong>
  </p>';

$tabModulesContent .=  $modules;

?>