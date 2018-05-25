<?php

/** Save review data */

function saveItem (){

	global $id, $message, $do;

    $reviewData = array();

    $postedDate = validateInput('posted_on');

    $postedDate = (validateDate( $postedDate, 'd/m/Y' )) ? Helper::formateDate($postedDate) : null;

    $reviewData['person_name']     = validateInput('person_name');
    $reviewData['person_location'] = validateInput('person_location');
    $reviewData['date_posted']     = $postedDate;
    $reviewData['description']     = validateInput('description');
    $reviewData['photo_path']      = validateInput('photo_path');

    updateRow($reviewData, 'review', "WHERE id = '{$id}' LIMIT 1");

    $message = "Review has been saved";

}

?>