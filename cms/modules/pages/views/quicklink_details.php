<?php
/** QuickLink info tab content */

$tabQuicklinksContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="6">
    <tr>
      <td width="160">
        <label for="ql_heading">Quicklink Heading:</label>
      </td>
      <td>
        <input type="text" name="ql_heading" id="ql_heading" 
         value="'.$pageQlHeading.'" style="width:300px;" /></td>
    </tr>
    <tr>
      <td width="160">
        <label for="ql_photo_path">Quicklink Photo:</label>
      </td>
      <td>
        <input type="text" name="ql_photo_path" id="ql_photo_path"
         value="'.$pageQlPhotoPath.'" style="width:300px;" />
        <input type="button" value="browse"
         onclick="openFileBrowser(\'ql_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'ql_photo_path\')"><br>
      </td>
    </tr>
    <tr>
      <td width="160">
        <label for="ql_button_text">Quicklink Button Label:</label>
      </td>
      <td>
        <input type="text" name="ql_button_text" 
         id="ql_button_text"
         value="'.$pageQlButtonText.'" style="width:300px;" />
      </td>
    </tr>    
    <tr>
      <td width="160" valign="top">
        <label for="ql_description">Quicklink Description:</label>
      </td>
      <td>
        <textarea name="ql_description" id="ql_description"
         style="width:100%; height: 150px; resize: none;">'
         .$pageQlDescription.'</textarea>
      </td>
    </tr>
</table>';
?>