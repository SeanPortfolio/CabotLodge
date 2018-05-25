<?php

$tabHomeDetailsContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
    <tr>
      <td width="150">
        <label for="homepage_hero_caption">Hero Caption</label>
      </td>
      <td>
        <input name="homepage_hero_caption" id="homepage_hero_caption" type="text"
         value="'.$gsHomeHeroCaption.'" style="width:350px;" /></td>
    </tr>
    <tr>
      <td>
        <label for="homepage_content_photo_path">Home Content Photo:</label>
      </td>
      <td>
        <input type="text" name="homepage_content_photo_path" id="homepage_content_photo_path" readonly 
         value="'.$gsHomeContentPhotoPath.'" style="width:250px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'homepage_content_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'homepage_content_photo_path\')"><br>
      </td>
    </tr>  
    <tr>
      <td>
        <label for="homepage_stay_photo_path">Home Stay Photo:</label>
      </td>
      <td>
        <input type="text" name="homepage_stay_photo_path" id="homepage_stay_photo_path" readonly 
         value="'.$gsHomeStayPhotoPath.'" style="width:250px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'homepage_stay_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'homepage_stay_photo_path\')"><br>
      </td>
    </tr>
    <tr>
      <td>
        <label for="homepage_polaroid_photo_path">Home Polaroid Photo:</label>
      </td>
      <td>
        <input type="text" name="homepage_polaroid_photo_path" id="homepage_polaroid_photo_path" readonly 
         value="'.$gsHomePolaroidPhotoPath.'" style="width:250px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'homepage_polaroid_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'homepage_polaroid_photo_path\')"><br>
      </td>
    </tr>
    <tr>
      <td>
        <label for="homepage_polaroid_text">Polaroid Photo Text:</label>
      </td>
      <td>
        <input name="homepage_polaroid_text" id="homepage_polaroid_text" type="text"
         value="'.$gsHomePolaroidPhotoText.'" style="width:350px;" />
      </td>
    </tr>
  </table>';
?>