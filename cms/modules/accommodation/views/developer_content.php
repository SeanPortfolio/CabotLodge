<?php
/** developer content tab view */
$tabDeveloperContent = '<table width="100%" border="0"
   cellspacing="0" cellpadding="4">
    <tr>
      <td valign="top">
        <label for="page_code_head_close">Head tag insert (close)</label>
      </td>
      <td valign="top">
        <textarea name="page_code_head_close" id="page_code_head_close"
         style="width:720px; height:150px;resize:none;">'.$itemCodeHeadClose.'</textarea>
        <span data-toggle="tooltip" data-placement="left" data-title="Insert code before closing head tag.">
        </span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="page_code_body_open">Body tag insert (open)</label>
      </td>
      <td valign="top">
        <textarea name="page_code_body_open" id="page_code_body_open"
         style="width:720px; height:150px;resize:none;">'.$itemCodeBodyOpen.'</textarea>
        <span data-toggle="tooltip" data-placement="left" data-title="Insert code after opening body tag."></span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="page_code_body_close">Body tag insert (close)</label>
      </td>
      <td valign="top">
        <textarea name="page_code_body_close" id="page_code_body_close" 
         style="width:720px; height:150px;resize:none;">'.$itemCodeBodyClose.'</textarea>
        <span data-toggle="tooltip" data-placement="left" data-title="Insert code before closing body tag."></span>
      </td>
    </tr>
  </table>';
?>