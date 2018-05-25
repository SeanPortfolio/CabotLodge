<?php

require_once 'inc/vars.php';

if(sanitizeInput('continue') === '1' && $formIsValid === true)
{
	require_once 'inc/insert_data.php';

} elseif(isset($_GET['success'])) {

	require_once 'views/success.php';

} else {

	require_once 'views/form.php';

}

$templateTags['mod_view'] = ($contactFormView) ? $contactFormView : '';

?>