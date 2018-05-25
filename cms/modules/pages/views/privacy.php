<?php
/** Robot List - Index, Follow, No-Index, No-Follow, None, No-archive */

$robotsList = '';

$robots = fetchAll("SELECT `id`, 
    `name`, 
    `title` 
  FROM `page_meta_index`
  WHERE 1");

if (!empty($robots)) {

  foreach ($robots as  $robot) { 

    $selectedRobot = ($robot['id'] == $pageMetaIndexId) 
      ? ' checked="checked"' 
      : '';

    $robotsList .='<div style="margin-bottom:5px;">
        <label class="checkbox-inline">
          <span data-title="'.$robot['title'].'" 
           data-placement="left" data-toggle="tooltip" style="margin-top:2px;">
          </span>
          <input type="radio" name="page_mrobots" value="'.$robot['id'].'" 
           style="margin:2px 0 0 0px;vertical-align:text-top;" 
           '.$selectedRobot.'> '.$robot['name'].'
        </label>
      </div>';
    }
}
    
$tabPrivacyContent = '<table width="100%">
    <tr>
      <td colspan="2">
        <strong>
          Edit the following settings with caution. 
          If in doubt, leave them in their default values
        </strong>
      </td>
    </tr>
    <tr>
      <td colspan="2"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="top" width="100">
        <label for="robots">Robots 
          <span data-toggle="tooltip" data-placement="bottom" 
          data-title="Restrict search engines from archiving this page, 
            following links on this page etc. 
            Hover over the selections to the right to see what they mean.">
          </span>
        </label>
      </td>
      <td>'.$robotsList.'</td>
    </tr>
  </table>';
?>