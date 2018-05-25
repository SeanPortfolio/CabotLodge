<?php
/** Settings tab content */

/** generate parent page list */
require_once 'generate_parent_list.php';

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
    '.createItemList($SlideshowQuery, $pageSlideshowId).'
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
    '.createItemList($galleryQuery, $pageGalleryId).'
  </select>';

/** Template dropdown */

$selectTemplateView = getTemplateList($pageTemplateId);
    
if ($id == 1) { 

  $pageUrlView = '<td></td>
    <td>
      <input name="url" type="hidden" id="page_url" 
       value="'.$pageUrl.'" data-cvalue="'.$pageUrl.'" data-type="gp">
      <span id="page_url_msg" class="text-danger"></span>
    </td>';

} else { 
    
  $pageUrl = rtrim($pageUrl, '/');

  $pageUrlView = '<td>
      <label for="page_url">URL</label>
    </td>
    <td>
      <input name="url" type="text" id="page_url" 
       value="'.$pageUrl.'" data-cvalue="'.$pageUrl.'"
       data-type="gp" style="width:250px;" class="item-url" />
      <span id="page_url_msg" style="margin-left:10px;"
       class="text-danger"></span>
    </td>';

}    

$tabSettingsContent = '<table width="100%" border="0"
   cellspacing="0" cellpadding="6">
    <tr>'.$pageUrlView.'</tr>
    <tr>
      <td width="170">
        <label for="name">CMS Label:</label>
      </td>
      <td>
        <input type="text" name="name" id="name"
         value="'.$pageName.'"style="width:250px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Menu Label:</label>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label"
         value="'.$pageMenuLabel.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="footer_menu">Footer Menu:</label>
      </td>
      <td>
        <input type="text" name="footer_menu" id="footer_menu"
         value="'.$pageFooterMenu.'" style="width:250px;" />
      </td>
    </tr>
    <tr>'.$parentPageList.'</tr>
    <tr>
      <td>
        <label for="video_id">Hero Video Id:</label>
      </td>
      <td>
        <input type="text" name="video_id"  id="video_id"
         value="'.$pageVideoId.'" style="width:250px;" autocomplete="off">
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
        <label for="photo_path">Hero Photo:</label>
      </td>
      <td>
        <input type="text" name="photo_path" id="photo_path" readonly 
         value="'.$pagePhotoPath.'" style="width:250px;" autocomplete="off">
        <input type="hidden" name="thumb_photo_path" id="thumb_photo_path" 
         value="'.$pagePhotoThumbPath.'" readonly autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'photo_path\')"><br>
      </td>
    </tr> 
    <tr>
      <td>
        <label for="motif_path">Motif Photo:</label>
      </td>
      <td>
        <input type="text" name="motif_path" id="motif_path" readonly 
         value="'.$pageMotifPath.'" style="width:250px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openFileBrowser(\'motif_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'motif_path\')"><br>
      </td>
    </tr>    
    <tr>
      <td>
        <label for="photo_heading">Hero Caption Heading:</label>
      </td>
      <td>
        <input type="text" name="photo_heading" style="width:250px;" 
         id="photo_heading" value="'.$pagePhotoCaptionHeading.'" >
      </td>
    </tr>
    <tr>
      <td>
        <label for="photo_caption">Hero Caption:</label>
      </td>
      <td>
        <input type="text" name="photo_caption" id="photo_caption"
         value="'.$pagePhotoCaption.'" style="width:250px;" >
      </td>
    </tr>
    <tr>
      <td>
        <label for="gallery_id">Gallery:</label>
      </td>
      <td>'.$selectGalleryView.'</td>
    </tr>
    <tr>
      <td>
        <label for="template_id">Template:</label>
      </td>
      <td>'.$selectTemplateView.'</td>
    </tr>
  </table>';

?>