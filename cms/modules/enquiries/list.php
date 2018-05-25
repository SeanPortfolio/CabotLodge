<?php
/** Generate item table list */

function generateTable()
{
  global $do;

  $sqlEnquiry = "SELECT `id`, 
      TRIM(CONCAT(`first_name`, ' ', `last_name`)) AS name, 
      `email_address`,
      DATE_FORMAT(`date_of_enquiry`, '%e %b %Y @ %h:%i %p') AS date_enquired
    FROM `enquiry`
    WHERE `status` != '".FLAG_DELETED."'
    ORDER BY `date_of_enquiry` DESC";
  
  $arrEnquiries = fetchAll($sqlEnquiry);

  if(!empty($arrEnquiries)) {
    
    foreach ($arrEnquiries as $enquiry) {

      $enquiryId          = $enquiry['id'];
      $enquiryPersonName  = $enquiry['name'];
      $enquiryPersonEmail = Helper::mailTo($enquiry['email_address']);
      $enquiryStatus      = $enquiry['status'];
      $enquiryDate        = $enquiry['date_enquired'];

      $longEnquiryId     = str_pad($enquiryId, 4, 0, STR_PAD_LEFT);
  
      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$enquiryId.'"><span></span>
        </label>';
    
      $rowItems .= '<tr>
        <td width="20" align="center">'.$itemSelect.'</td>
        <td width="70">
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$enquiryId.'">#'.$longEnquiryId.'</a>
        </td>
        <td width="200">'.$enquiryPersonName.'</td>
        <td width="200">'.$enquiryPersonEmail.'</td>
        <td width="150">'.$enquiryDate .'</td>
        </tr>';
    }

  } else {

    $rowItems .= '<tr>
      <td colspan="5" align="center" class="no-data">No enquiries available.</td>
    </tr>';

  }

  return $rowItems;
}
?>