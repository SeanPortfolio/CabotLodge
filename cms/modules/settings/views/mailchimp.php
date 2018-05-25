<?php
/** mailchimp tab content */

$tabMailchimpContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
    <tr>
      <td width="150">
        <label for="mailchimp_list_id">List ID</label>
      </td>
      <td>
        <input type="text" name="mailchimp_list_id" id="mailchimp_list_id"
         value="'.$gsMailchimpListId.'" style="width:150px;" />
      </td>
    </tr>
    <tr>
      <td width="150">
        <label for="mailchimp_api_key">API Key</label>
      </td>
      <td>
        <input type="text" name="mailchimp_api_key" id="mailchimp_api_key"
         value="'.$gsMailchimpApiKey.'" style="width:350px;" /></td>
    </tr>
  </table>';
?>