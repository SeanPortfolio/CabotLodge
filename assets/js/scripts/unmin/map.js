(function(w, d, $){
  
  // DEFINE GLOBAL FUNCTIONS, VARIABLES & CONSTANTS
  
  var map,
      infoWindow,
      mapMarkerIcon = '/graphics/map-marker.png';
  
  /**
  * This function uses Google maps v3 API to show map
  *
  * @param string canvasId, ID selector (without #) of a element on which 
  *                         map will be loaded
  *
  * @param object options, object of map settings
  *
  * @return void
  */
  function showMap(canvasId, options) {

    var canvas = document.getElementById(canvasId);

    if (!canvas || !options) {
      console.warn('missing parameters for google maps');
      return false;
    }
    
    if (canvas) {
      
      var lat = parseFloat(options.lat),
          lng = parseFloat(options.lng),
          zoom = parseInt(options.zoom);
      
      if (!zoom) {
        zoom = 15;
      }
      
      var mapCenter = new google.maps.LatLng(lat, lng);
      
      var mapOptions = {
        zoom: zoom,
        center: mapCenter, 
        scrollwheel: false,
        draggable:true,
        scalecontrol:true,
        streetViewControl:true,
        styles:[
          {
              "featureType": "all",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#ffaa00"
                  },
                  {
                      "saturation": "-33"
                  },
                  {
                      "lightness": "10"
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                  {
                      "visibility": "simplified"
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "labels.text",
              "stylers": [
                  {
                      "visibility": "on"
                  }
              ]
          }],
        mapTypeControl: true
      };

      map = new google.maps.Map(canvas, mapOptions);

      marker = new google.maps.Marker({
        position: mapCenter,
        map: map,
        icon: mapMarkerIcon,
        title: options.title
      });
      
      if (options.infoWindowContent) {
        
        if (infoWindow) {
          infoWindow.close();
        }
        
        infoWindow = new google.maps.InfoWindow({
          content: options.infoWindowContent
        });
        
        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
        
      }
    
    }
    
  }
  
  
  w.initGoogleMap = function(canvasId, options) {
    
    showMap(canvasId, options);
    
  };
  
})(window, document, jQuery);