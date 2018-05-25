<?php
/** social links tab content */

$tabSocialLinksContent = '';
    
$slQuery = "SELECT `id`,
    `label`,
    `url`
  FROM `social_links`
  WHERE `is_active` = '".FLAG_YES."' 
  ORDER BY `rank` ";

$socialIcons = fetchAll($slQuery);

if (!empty($socialIcons)) {

  $socialLinks = '';

  foreach ($socialIcons as $index => $socialIcon) {

    $socialLinkId    = $socialIcon['id'];
    $socialLinkLabel = $socialIcon['label'];
    $socialLinkUrl   = $socialIcon['url'];
    
    $socialLinks .= '<tr>
        <td width="150" valign="top">
          <label for="social-item-'.$socialLinkId.'">
            '.$socialLinkLabel.'
          </label>
        </td>
        <td>
          <input type="text" style="width:700px"
           id="social-item-'.$socialLinkId.'"
           name="social-item['.$socialLinkId.']"
           value="'.$socialLinkUrl.'" ">
        </td>
      </tr>';
}

$tabSocialLinksContent = '<table width="100%" border="0"
   cellspacing="0" cellpadding="4">
    '.$socialLinks.'
  </table>';

} 
?>