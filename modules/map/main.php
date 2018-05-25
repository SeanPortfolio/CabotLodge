<?php

if($latitude && $longitude && $zoomLevel && $markerLatitude && $markerLongitude)
{
	$mapHeading        = (!empty($mapHeading)) ? $mapHeading : $companyName;
	$mapAddress        = (!empty($mapAddress)) ? $mapAddress : $contactAddress;

	$jsVars['map']['lat']               = $markerLatitude;
	$jsVars['map']['lng']               = $markerLongitude;
	$jsVars['map']['zoom']              = $zoomLevel;
	$jsVars['map']['title']             = $mapHeading;
	$jsVars['map']['infoWindowContent'] = '<p style="width:200px;color:#000;font-weight:normal;font-size:17px;">'.$mapAddress.'</p>';

	$templateTags['script_ext'].= '<script src="https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAP_KEY.'"></script>';
  
  $mapContent = '<section class="section section--no-gutters">
      <div class="container-fluid map">	        			
        <div class="row">
          <div class="col-xs-12 map__wrapper">
            <div id="map-canvas" style="height:600px;"></div>
          </div>
        </div>
      </div>
    </section>';

  $templateTags['mod_view'] .= $mapContent;
}

?>