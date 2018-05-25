<?php

/** Meta tags tab content */

$tabMetaContent = '<table width="100%" border="0" 
    cellspacing="0" cellpadding="6" >
    <tr>
      <td width="150" valign="top">
        <label for="title">Title:</label>
      </td>
      <td>
        <input type="text" name="title"  id="title" class="check-max" 
        value="'.$pageTitle.'" style="width:600px;"><br>
        <span class="text-muted">
          <small>Page titles should be under 65 characters (including spaces) 
            <em></em>
          </small>
        </span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="meta_description">Meta Description:</label>
      </td>
      <td>
        <textarea name="meta_description" id="meta_description"
         class="check-max"
         style="width:600px;"
         rows="5" >'.$pageMetaDescription.'</textarea>
        <br>
        <span class="text-muted">
          <small>
            Meta descriptions should be between 150-160 characters 
            (including spaces) <em></em>
          </small>
        </span>
      </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
      <td width="150" valign="top">
        <label for="og_title">OG Title:</label
      </td>
      <td>
        <input type="text" name="og_title" id="og_title" class="check-max"
         value="'.$pageOgTitle.'" style="width:600px;"><br>
        <span class="text-muted">
          <small>
            Page titles should be under 65 characters (including spaces) 
            <em></em>
          </small>
        </span>
      </td>
    </tr>
    <tr>
      <td width="150" valign="top">
        <label for="og_image">OG Photo:</label>
      </td>
      <td>
        <input type="text" name="og_image"  id="og_image" 
         value="'.$pageOgPhotoPath.'"
         style="width:350px;" readonly autocomplete="off">
        <input type="button" value="browse"
         onclick="openFileBrowser(\'og_image\')"> 
        <input type="button" value="clear"
         onclick="clearValue(\'og_image\')"><br>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="og_meta_description">OG Meta Description:</label>
      </td>
      <td>
        <textarea name="og_meta_description" id="og_meta_description"
         class="check-max" 
         style="width:600px;" rows="5" >'.$pageOgMetaDescription.'</textarea>
        <br>
        <span class="text-muted">
          <small>
            Meta descriptions should be between 150-160 characters 
            (including spaces) <em></em>
          </small>
        </span>
      </td>
    </tr>
  </table>';

?>