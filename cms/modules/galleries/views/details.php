<?php
/** View for details tab */

$tabDetailsContent = '<table width="100%" border="0"
  cellspacing="0" cellpadding="4" >
    <tr>
      <td width="150"><label for="label">Name:</label></td>
      <td>
        <input name="label" class="textbox" type="text" id="label"
         value="'.$name.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="150"><label for="menu_label">Tab Label:</label></td>
      <td>
        <input name="menu_label" class="textbox" type="text" id="menu_label"
         value="'.$menuLabel.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="150">
        <label for="show_on_gallery_page">Show on gallery page:</label
      </td>
      <td>
        <input name="show_on_gallery_page" type="checkbox" 
         id="show_on_gallery_page"
         value="'.FLAG_YES.'" 
         '.(($showOnGalleryPage === FLAG_YES) ? ' checked="checked"': '').'/>
      </td>
    </tr>
  </table>';

?>