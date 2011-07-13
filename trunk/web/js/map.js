var map;
var geocoder;
var markersArray = [];  //menyimpan marker dari overlay (objek) yang ada pada peta
var locationArray = [];
//var infowindow = new google.maps.InfoWindow();

/*
 * initialize map
 */
function initmap(page) {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(0, 0);
    var myOptions = {
        zoom: 1,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    initMarkersArray(page);
    clearOverlays();
    showOverlay();
    alert(markersArray.length);
    for (i=0; i<markersArray.length; i++) {
        alert("halo");
        var infowindow = new google.maps.InfoWindow({
            content: markersArray[i]['title']
        });
        google.maps.event.addListener(markersArray[i], 'click', function() {
            infowindow.open(map,markersArray[i]);
        });
    }
    if (page == 'editlocation') {
        // bisa create pin
        google.maps.event.addListener(map, 'click', function(event) {
            if (markersArray.length < 2) {
                // pin cuma bisa 1 lokasi
                deleteOverlays();
                addMarker('my location', event.latLng, true);
                clearOverlays();
                showOverlay();
                setLocation();
            } else {
                // pin gak mungkin lebih dari 1 lokasi
            }
        });
    } else if (page == 'searchfriend') {
        // gak bisa create pin di halaman searchfriend
    }
}

/*
 *  initialisasi marker-marker yang disimpan dalam markersArray
 *  untuk page searchfriend, marker diperoleh dari data location(latitude-longitude) pada tabel user
 */
function initMarkersArray(page) {
    deleteOverlays();
    if (page == 'editlocation') {
        // markersArray diisi dengan data lokasi user yang bersangkutan
        var link = "http://localhost/sanurs/web/index.php/profile/get_user_location";
        $.ajax({
            url: link,
            type: 'POST',
            success: function(msg) {
                lat = msg['lat'];
                lng = msg['lng'];
                if (lat!=null && lng!=null) {
                    latlng = new google.maps.LatLng(lat,lng);
                    addMarker('my location', latlng, true);
                }
            }
        });
    } else if (page == 'searchfriend') {
        // markersArray diisi dengan data lokasi semua user di database kecuali user yang bersangkutan
        var link = "http://localhost/sanurs/web/index.php/profile/get_all_location";
        $.ajax({
            url: link,
            type: 'POST',
            success: function(msg) {
                if (msg.length > 0) {
                    for (i=0; i<msg.length; i++) {
                        name = msg[i]['name'];
                        lat = msg[i]['lat'];
                        lng = msg[i]['lng'];
                        latlng = new google.maps.LatLng(lat,lng);
                        addMarker(name, latlng, false);
                    }
                }
            }
        });
    }
}

/*
 * untuk menambah marker overlay (objek) yang ada pada peta
 * marker posisi lokasi objek disimpan dalam markerArray
 */
function addMarker(title, location, draggable) {
    marker = new google.maps.Marker({
        position : location,
        title : title,
        draggable : draggable,
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

function tesGeocode() {
    if ($('input[name=location]').attr('value') != null) {
        var address = $('input[name=location]').attr('value');
        geocoder.geocode(
            {'address' : address},
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    deleteOverlays();
                    addMarker('my location', results[0].geometry.location, true);
                    clearOverlays();
                    showOverlay();
                    setLocation();
                } else {
                    alert("Geocode was not successfull for the following reason : " + status);
                }
            }
        );
    } else {
        // do nothing, masukan salah
    }
}
            
function codeLatLng(latlng) {
    var address;
    geocoder.geocode(
    {
        'latlng' : latlng
    },
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

/*
 * memasukkan data baru ke dalam locationArray
 */
function addLocation(data) {
    locationArray.push(data);
}

/*
 * menghapus semua isi locationArray
 */
function deleteLocation() {
    if (locationArray) {
        for (i in locationArray) {
            locationArray[i] = "";
        }
        locationArray.length = 0;
    }
}

/*
 * mengisi locationArray dengan lokasi user,
 * lalu mengirim nilai baru ke form di view (untuk edit location)
 */
function setLocation() {
    deleteLocation();
    latlngStr = markersArray[0].position.toString();
    latlngStr = latlngStr.substring(1,latlngStr.length-1);
    latlngStr = latlngStr.split(",", 2);
    lat = parseFloat(latlngStr[0]);
    lng = parseFloat(latlngStr[1]);
    addLocation(lat);
    addLocation(lng);
    sendLocation();
}

/*
 * mengirim isi locationArray dengan method POST
 * untuk dimanfaatkan pada edit location
 */
function sendLocation() {
    $('input[name=save_lat]').attr('value', locationArray[0]);
    $('input[name=save_lng]').attr('value', locationArray[1]);
}