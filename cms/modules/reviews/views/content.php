<?php
$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td width="130">
        <label for="person_name">Person Name:</label>
      </td>
      <td>
        <input type="text" name="person_name" id="person_name" value="'.$reviewPersonName.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="person_location">Person Location:</label>
      </td>
      <td>
        <input type="text" name="person_location" 
         id="person_location" value="'.$reviewLocation.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="posted_on">Posted On:</label>
      </td>
      <td>
        <input type="text" name="posted_on" id="posted_on" value="'.$reviewDate.'" style="width:250px;cursor:text;" />
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="photo_path">Photo:</label>
      </td>
      <td>
        <input name="photo_path" type="text" value="'.$reviewPhotoPath.'" 
          style="width:250px;" data-thumb-elm="#page_thumb_photo" id="photo" readonly autocomplete="off">
        <input type="button" value="browse" onclick="openFileBrowser(\'photo\')"> 
        <input type="button" value="clear" onclick="clearValue(\'photo\')"><br>

      </td>
    </tr>
    <tr>
      <td width="130" valign="top">
        <label for="description">Description:</label>
      </td>
      <td valign="top">
        <textarea name="description" id="description" style="width:718px;min-height:200px;">'
         .$reviewDescription.'</textarea>
      </td>
    </tr>
</table>';

$extraScripts .= "<script>
    $('#posted_on').attr({autocomplete:'off', readonly:true}).datepicker({
        dateFormat:'dd/mm/yy'
    });
  </script>";

?>