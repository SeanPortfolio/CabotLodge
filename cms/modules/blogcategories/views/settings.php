<?php

$itemUrl = rtrim($itemUrl, '/');

$tabSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td>
        <label for="page_url">URL</label>
      </td>
      <td>
        <input name="url" type="text" id="page_url" 
        value="'.$itemUrl.'" data-cvalue="'.$itemUrl.'"
        data-type="mod" style="width:250px;" class="item-url" />
        <span id="page_url_msg" style="margin-left:10px;"
        class="text-danger"></span>
      </td>
    </tr>
    <tr>
      <td width="170">
        <label for="name">CMS Label:</label>
      </td>
      <td>
        <input type="text" name="name" id="name"
         value="'.$itemName.'"style="width:250px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Menu Label:</label>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label"
         value="'.$itemMenuLabel.'" style="width:250px;" />
      </td>
    </tr>
  </table>';

?>