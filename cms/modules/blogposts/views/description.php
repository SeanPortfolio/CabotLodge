<?php

/** View for description Tab */

$tabDescriptionContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8">
    <tr>
      <td valign="top" colspan="2">
        <label for="description">Description:</label>
        <textarea name="description" id="description"
         style="width:100%;min-height:200px;">'.$itemDescription.'</textarea>        
      </td>
    </tr>
  </table>';

$extraScripts .= "<script>
    CKEDITOR.replace( 'description',
    {
        toolbar : 'MyToolbar',
        forcePasteAsPlainText : true,
        resize_enabled : false,
        height : 450,
        filebrowserBrowseUrl : jsVars.dataManagerUrl
    });               
  </script>";
