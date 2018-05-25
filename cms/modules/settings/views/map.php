<?php

$tabMapContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="100"><label for="map_heading">Marker Title</label></td>
      <td>
        <input type="text" style="width:350px;" id="map_heading" name="map_heading" value="'.$gsMapHeading.'">
      </td>
    </tr>
    <tr>
      <td width="100"><label for="map_address">Map Address</label></td>
      <td>
        <input type="text" style="width:350px;" id="map_address" name="map_address" value="'.$gsMapAddress.'">
        <button type="button" id="get-map-address">Search</button>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div id="gmap-canvas" data-map-trigger="#ui-id-2">
          <h3 style="font-size:18px;color:#000;padding:10px;font-weight:700;margin:0;">Loading map...</h3>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="hidden" id="map_latitude" name="map_latitude" value="'.$gsMapLatitude.'">
        <input type="hidden" id="map_longitude" name="map_longitude" value="'.$gsMapLongitude.'">
        <input type="hidden" id="map_zoom_level" name="map_zoom_level" value="'.$gsMapZoomLevel.'">
        <input type="hidden" id="map_marker_latitude" name="map_marker_latitude" value="'.$gsMapMarkerLatitude.'">
        <input type="hidden" id="map_marker_longitude" name="map_marker_longitude" value="'.$gsMapMarkerLongitude.'">
        <textarea name="map_styles" id="map_styles" class="hidden">'.$gsMapStyles.'</textarea>
      </td>
    </tr>
  </table>';

$extraScripts .= '<script src="https://maps.google.com/maps/api/js?key='.GOOGLE_MAP_KEY.'"></script>';
$extraScripts .= '<script src="'.ADMIN_BASE_URL.'/js/general-map.js?v=1"></script>';

?>