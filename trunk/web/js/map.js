var map;    //variabel penyimpan peta
var geocoder;
var markersArray = [];  //menyimpan marker dari overlay (objek) yang ada pada peta
var infowindow = new google.maps.InfoWindow();

/*
 * initialize map
 */
function initialize() {
    geocoder = new google.maps.Geocoder();
    //var latlng = new google.maps.LatLng(-34.397, 150.644);
    //var latlng = new google.maps.LatLng(-6.20336, 106.8437);
    //var latlng = new google.maps.LatLng(37.339085, -121.8914807);
    var latlng = new google.maps.LatLng(0, 0);
    var myOptions = {
        zoom: 1,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    //mapTypeId: google.maps.MapTypeId.HYBRID
    //mapTypeId: google.maps.MapTypeId.TERRAIN
    //mapTypeId: google.maps.MapTypeId.SATELLITE
    //mapTypeId: 'satellite'
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    //map.setTilt(45);
}

/*
 * untuk menambah marker overlay (objek) yang ada pada peta
 * marker posisi lokasi objek disimpan dalam markerArray
 */
function addMarker(location) {
    marker = new google.maps.Marker({
        position : location,
        map : map
    });
    markersArray.push(marker);
}

/*
 * Shows any overlays currently in the array
 */
function showOverlay() {
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(map);
        }
    }
}

/*
 * Removes the overlays from the map, but keeps them in the array
 */
function clearOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
  }
}

/*
 * Deletes all markers in the array by removing references to them
 */
function deleteOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
}

/*
 * mengubah address (alamat yang dimengerti manusia) menjadi koordinat latitude-longitude
 * mengembalikan nilai latlng dari address
 */
function codeAddress(address) {
    var latlng;
    
    geocoder.geocode(
        { 'address' : address },
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latlng = results[0].geometry.location;
            } else {
                latlng = (0,0);
            }
        }
    );
    return latlng;
}
            
function codeLatLng() {
    var input = document.getElementById("latlng").value;
    var latlngStr = input.split(",", 2);
    var lat = parseFloat(latlngStr[0]);
    var lng = parseFloat(latlngStr[1]);
    geocoder.geocode({
        'latlng' : latlng
    },
    function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                map.setZoom(11);
                marker = new google.maps.Marker({
                    position : latlng,
                    map : map
                });
                infowindow.setContent(results[1].formatted_address);
                infowindow.open(map, marker);
            }
        } else {
            alert ("Geocoder failed due to : " + status);
        }
    }
    );
}