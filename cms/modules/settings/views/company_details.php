<?php

$tabCompanyDetailsContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
    <tr>
      <td width="150">
        <label for="company_name">Company name</label>
      </td>
      <td>
        <input name="company_name" id="company_name" type="text"
         value="'.$gsCompanyName.'" style="width:350px;" /></td>
    </tr>
    <tr>
      <td>
        <label for="phone_number">Phone Number</label>
      </td>
      <td>
        <input name="phone_number" id="phone_number" type="text"
         value="'.$gsPhoneNumber.'" style="width:150px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="start_year">Start year</label>
      </td>
      <td>
        <input name="start_year" id="start_year" type="text" 
         value="'.$gsStartYear.'" style="width:150px;"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="slideshow_speed">Slideshow Speed</label>
      </td>
      <td>
        <input name="slideshow_speed" id="slideshow_speed" type="text" 
         value="'.$gsSlideshowSpeed.'" style="width:150px;"  />
          <strong>&nbsp;seconds</strong>
      </td>
    </tr>
    <tr>
      <td>
        <label for="booking_id">Booking ID</label>
      </td>
      <td>
        <input name="booking_id" id="booking_id" type="text" 
         value="'.$gsBookingId.'" style="width:150px;"  />
      </td>
    </tr>
    <tr>
      <td>
        <label for="booking_url">Booking URL</label>
      </td>
      <td>
        <input name="booking_url" id="booking_url" type="text" 
         value="'.$gsBookingUrl.'" style="width:350px;"  />
      </td>
    </tr> 
    <tr>
      <td width="150">
        <label for="robot_meta_tag">Activate Robots Tag:</label
      </td>
      <td>
        <input name="robot_meta_tag" type="checkbox" 
         id="robot_meta_tag"
         value="'.FLAG_YES.'" 
         '.(($gsRobotsMetaTag === FLAG_YES) ? ' checked="checked"' : '').'/>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="email_address">Email(s)</label> 
      </td>
      <td>
        <textarea name="email_address" style="width:350px;min-height:100px;">'
         .$gsEmailAddress.'</textarea>
        <br/>
        <small>Separate multiple email addresses with a semicolon ( ; )</small>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="address">Address</label>
      </td>
      <td>
        <textarea name="address" style="width:350px;min-height:100px;">'
         .$gsAddress.'</textarea>
      </td>
    </tr>
    <tr>
      <td>
        <label for="reviews_photo_path">Review Photo:</label>
      </td>
      <td>
        <input type="text" name="reviews_photo_path" id="reviews_photo_path" readonly 
         value="'.$gsReviewsPhotoPath.'" style="width:250px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'reviews_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'reviews_photo_path\')"><br>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="hidden" name="id" value="'.$id.'">
      </td>
    </tr>
  </table>';
?>