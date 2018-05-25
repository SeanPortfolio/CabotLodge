<?php

$enquiryData = array();

$enquiryData['first_name']        = $firstName;
$enquiryData['last_name']         = $lastName;
$enquiryData['email_address']     = $emailAddress;
$enquiryData['contact_number']    = $contactNumber;
$enquiryData['subject']           = $subject;
$enquiryData['comments']          = $message;
$enquiryData['status']            = FLAG_ACTIVE;
$enquiryData['ip_address']        = getenv('REMOTE_ADDR');

$newEnquiryId = insertRow($enquiryData, 'enquiry');

$contactDetails = array();

if ($newEnquiryId) {

	// get new enquiry details from database
	$contactDetails = fetchRow("SELECT  `first_name` AS firstName,
			`last_name` AS lastName,
			`email_address` AS emailAddress,
			`contact_number` AS contactNumber,
			`subject`,
			`comments`,
			DATE_FORMAT(`date_of_enquiry`, '%e %M %Y @ %h:%i %p') AS dateEnquired
		FROM `enquiry`
		WHERE `id` = '$newEnquiryId'
		LIMIT 1");

	$emailTemplateTags = array();
	
	$emailTemplateTags['emailSubject'] = (!empty($subject))? $subject : 'You have received a new enquiry from website.';
	$emailTemplateTags['root']		   	 = BASE_URL;
	$emailTemplateTags['comments']	   = $message;

	$emailTemplateTags['contactAddress']      = $contactAddress;
	$emailTemplateTags['contactPhoneNumber']  = $contactPhoneNumber;
	$emailTemplateTags['contactEmailAddress'] = $contactPrimaryEmail;

	//merge email template tags along with data from database
	$emailTemplateTags = array_merge($emailTemplateTags, $contactDetails);

	$emailTemplateTags['comments']	 = $message;
	$emailTemplateTags['subject']	   = $subject;

	// get email template file
	$emailTemplatePath = TEMPLATES_DIR_PATH."/email/contact.tmpl";

	$emailTemplate = processTemplate($emailTemplatePath, $emailTemplateTags);
		
	$companyContactEmail = ($contactPrimaryEmail) ? $contactPrimaryEmail : '';

	if ($companyContactEmail) {	
		// Send Email
		$mail = new PHPMailer();		
		$mail->IsHTML();
		$mail->AddReplyTo($emailTemplateTags['emailAddress']);
		$mail->AddAddress($companyContactEmail);
		
		if (!empty($objContactEmails)) {
			foreach ($objContactEmails->list as $email) {
				$mail->AddCC($email);
			}
		}

		$mail->SetFrom($companyContactEmail);

		$mail->FromName = "{$emailTemplateTags['firstName']} {$emailTemplateTags['lastName']}";
		$mail->Subject  = $emailTemplateTags['emailSubject'];
		
		$mail->msgHTML($emailTemplate);

		$isMailSent =  $mail->Send();
		// if email is sent, redirect user to success page

		if( $isMailSent ) {
		
			Helper::redirect($contactPageFullUrl.'?success='.md5($newEnquiryId));
			exit();
		}
	}
}

?>