var map;
var geocoder;
var markersArray = [];  //menyimpan marker dari overlay (objek) yang ada pada peta
var infowindow = new google.maps.InfoWindow();

/*
 * initialize map
 */
function initialize() {
    var latlng = new google.maps.LatLng(0, 0);
    var myOptions = {
        zoom: 1,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);  
}

/*
 * untuk menambah marker overlay (objek) yang ada pada peta
 * marker posisi lokasi objek disimpan dalam markerArray
 */
function addMarker(title, location) {
    marker = new google.maps.Marker({
        position : location,
        title : title,
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
        {'address' : address},
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latlng = results[0].geometry.location;
            } else {
                latlng = new google.maps.LatLng(0, 0);
            }
        }
    );
    return latlng;
}
            
function codeLatLng(latlng) {
    var address;
    geocoder.geocode(
        { 'latlng' : latlng },
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    address = results[1].formatted_address;
                }
            } else {
                address = "location not found";
            }
        }
    );
    return address;
}