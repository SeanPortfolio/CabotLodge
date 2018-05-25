<?php

/** View for description Tab */

$tabFeaturesContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8">
    <tr>
      <td valign="top" colspan="2">
        <label for="features">Features &amp; Highlights:</label>
        <textarea name="features" id="features"
         style="width:100%;min-height:200px;">'.$itemFeatures.'</textarea>        
      </td>
    </tr>
  </table>';

$extraScripts .= "<script>
    CKEDITOR.replace( 'features',
    {
        toolbar : 'MyToolbar',
        forcePasteAsPlainText : true,
        resize_enabled : false,
        height : 450,
        filebrowserBrowseUrl : jsVars.dataManagerUrl
    });               
  </script>";
