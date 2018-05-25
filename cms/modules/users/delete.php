<?php

/** Delete CMS user. */

function deleteItem()
{
  global $message, $itemSelected;

  if (!empty($itemSelected)) {

    foreach ($itemSelected as $item) {
     
      if($item == USER_ID) {

        $message = "Sorry, you can't delete the user logged in.";
        break;
        
      }

      $sql = "DELETE FROM `cms_users` WHERE `user_id` = " . $item;

      runQuery($sql);    
    }

    $message = "Selected users have been deleted";

  } else {

    $message = "Please select a user from the list";

  }
}
