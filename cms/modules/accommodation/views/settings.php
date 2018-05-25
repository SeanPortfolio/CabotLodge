<?php

/** slideshow dropdown */
$selectSlideshowView = '';

$SlideshowQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `photo_group`
  WHERE `name` != ''
    AND `type` = '".FLAG_SLIDESHOW."'
    AND `show_in_cms` = '".FLAG_YES."'
  ORDER BY `name`";

$selectSlideshowView = '<select name="slideshow_id" id="slideshow_id" 
   style="width:250px">
    <option value="">Please Select Slideshow</option>
    '.createItemList($SlideshowQuery, $itemSlideshowId).'
  </select>';

/** gallery dropdown */

$galleryQuery = "SELECT `id` AS ind, 
    `name` AS label
  FROM `photo_group`
  WHERE `name` != ''
    AND `type` = '".FLAG_GALLERY."'
    AND `show_in_cms` = '".FLAG_YES."'
  ORDER BY `name`";

$selectGalleryView = '<select name="gallery_id" id="gallery_id" 
   style="width:250px">
    <option value="">Please Select Gallery</option>
    '.createItemList($galleryQuery, $itemGalleryId).'
  </select>';

/** Template dropdown */
$selectTemplateView = getTemplateList($template_id);

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td><label for="name">CMS Label:</label></td>
      <td><input name="name" type="text" value="'.$itemName.'" style="width:350px;" id="name"></td>
    </tr>
    <tr>
      <td><label for="adult_price">Heading:</label></td>
      <td><input name="heading" type="text" value="'.$itemHeading.'" style="width:350px;" id="heading"></td>
    </tr>
    <tr>
      <td><label for="menu_label">Menu Label:</label></td>
      <td><input name="menu_label" type="text" value="'.$itemMenuLabel.'" style="width:150px;" id="menu_label"></td>
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
      <td><label for="price">From Price:</label></td>
      <td>
        <input name="price" type="text" value="'.$itemPrice.'" style="width:150px;" id="price"> 
        <strong>(NZD)</strong>
      </td>
    </tr> 
    <tr>
      <td><label for="booking_id">Booking ID:</label></td>
      <td>
        <input name="booking_id" type="text" value="'.$itemBookingId.'" style="width:150px;" id="booking_id"> 
      </td>
    </tr>
    <tr>
      <td><label for="beds">Number of Beds:</label></td>
      <td>
        <input name="beds" type="number" value="'.$itemBeds.'" style="width:150px;" id="beds"> 
      </td>
    </tr>
    <tr>
      <td><label for="guests">Number of Guests:</label></td>
      <td>
        <input name="guests" type="number" value="'.$itemGuests.'" style="width:150px;" id="guests"> 
      </td>
    </tr>
    <tr>
      <td><label for="bathrooms">Number of Bathrooms:</label></td>
      <td>
        <input name="bathrooms" type="number" value="'.$itemBathrooms.'" style="width:150px;" id="bathrooms"> 
      </td>
    </tr>
    <tr>
      <td>
        <label for="slideshow_id">Slideshow:</label>
      </td>
      <td>'.$selectSlideshowView.'</td>
    </tr>
    <tr>
      <td>
        <label for="gallery_id">Gallery:</label>
      </td>
      <td>'.$selectGalleryView.'</td>
    </tr>
    <tr>
      <td><label for="floor_plan">Floor Plan PDF:</label></td>
      <td>
          <input name="floorplan_pdf" type="text" value="'.$itemFloorPlanPdf.'" 
           style="width:350px;" id="floorplan_pdf" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openFileBrowser(\'floorplan_pdf\')"> 
          <input type="button" value="clear" onclick="clearValue(\'floorplan_pdf\')"><br>
      </td>
    </tr>
    <tr>
      <td><label for="photo_path">Hero Photo:</label></td>
      <td>
          <input name="photo_path" type="text" value="'.$itemPhotoPath.'" 
           style="width:350px;" id="photo_path" readonly autocomplete="off">
          <input name="thumb_photo_path" type="hidden" value="'.$itemPhotoThumbPath.'" 
           id="thumb_photo_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openFileBrowser(\'photo_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'photo_path\')"><br>
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

