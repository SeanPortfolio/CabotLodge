<?php

$sqlAuthorList = "SELECT `user_id` AS ind, 
    TRIM(CONCAT(`user_fname`, ' ', `user_lname`)) AS label
  FROM `cms_users`
  WHERE `user_fname` != ''
  ORDER BY label";

$authorList = createItemList($sqlAuthorList, $itemUpdatedBy);

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td><label for="menu_label_highlight_text">Heading:</label></td>
      <td><input name="heading" type="text" value="'.$itemHeading.'" style="width:550px;" id="heading"></td>
    </tr>
    <tr>
      <td width="170"><label for="page_url">URL</label></td>
      <td>
        <input name="url" type="text" id="page_url" value="'.$itemUrl.'" data-cvalue="'.$itemUrl.'"
         data-type="mod" style="width:250px;" class="item-url" />
        <span id="page_url_msg" style="margin-left:10px;" class="text-danger"></span>
      </td>
    </tr>
    <tr>
      <td><label for="author">Author:</label></td>
      <td>
          <select name="author" id="author" style="width:250px;">
              <option value="">-- select --</option>
              '.$authorList.'
          </select>
      </td>
    </tr>
    <tr>
      <td><label for="posted_on">Posted On:</label></td>
      <td><input name="posted_on" type="text" id="posted_on" value="'.$itemPostedOn.'" style="width:250px;" /></td>
    </tr>
    <tr>
      <td><label for="photo_path">Hero Photo:</label></td>
      <td>
          <input name="photo_path" type="text" value="'.$itemPhotoPath.'" 
           style="width:250px;" id="photo_path" readonly autocomplete="off">
          <input name="thumb_photo_path" type="hidden" value="'.$itemPhotoThumbPath.'" 
           id="thumb_photo_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openFileBrowser(\'photo_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'photo_path\')"><br>
      </td>
    </tr>            
    <tr>
      <td><label for="photo_caption_heading">Hero Caption Heading:</label></td>
      <td>
          <input name="photo_caption_heading" type="text" value="'.$itemPhotoCaptionHeading.'" style="width:550px;" id="photo_caption_heading">
      </td>
    </tr>
    <tr>
      <td><label for="photo_caption">Hero Caption:</label></td>
      <td>
        <input name="photo_caption" type="text" value="'.$itemPhotoCaption.'" style="width:550px;" id="photo_caption">
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="introduction">Introduction:</label></td>
      <td>
        <textarea name="introduction" id="introduction" style="width:550px;min-height:100px;">'.$itemIntroduction.'</textarea>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="short_description">Short Description:</label></td>
      <td>
        <textarea name="short_description" id="short_description" style="width:550px;min-height:100px;" class="check-max" maxlength="200">'.$itemShortDescription.'</textarea>
        <br><span class="text-muted"><small>Max 200 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
  </table>';

$extraScripts .= "<script>
    $('#posted_on').datepicker({
        dateFormat:'dd/mm/yy',
        changeYear:true,
        changeMonth:true
    });
    
    $('#heading').on('change', function(){
        $('#page_url').val(convertToSlug($(this).val()));
    });
    
    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-')
            ;
    }
  </script>";

