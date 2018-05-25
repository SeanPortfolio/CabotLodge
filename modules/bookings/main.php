<?php

if($mainPageId == $impPageBookings->id)
{
	if($mainBookingId)
	{
		$extra_qs = '';

	    $rcid     = $_GET['rcid'];
    	$extra_qs .= ( !empty($rcid) ) ? "&rcidlist={$rcid}" : '';

		$src            = 'https://www.resbook.net/calendar/?pid='.$mainBookingId.'&referrer=
						   &availability=show&'.$extra_qs;
		$bookingIframe = '<iframe frameborder="0" class="iframe" style="margin:15px 0;background-color:transparent;
							height:600px;width:100%;" scrolling="no" src="'.$src.'"></iframe>';
		
		$templateTags['mod_view'] = $bookingIframe;
	}
}

?>