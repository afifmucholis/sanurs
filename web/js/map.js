var map;
var geocoder;
var userArray = [];     //menyimpan info user
var markersArray = [];  //menyimpan marker dari overlay (objek) yang ada pada peta
var locationArray = []; //menyimpan lokasi user (digunakan pada edit location)
var areaLocation = [];  //isinya : name, latitude, longitude
var markerCluster;

/*
 * initialize map
 */
function initmap(page) {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-6.166092,106.833369);
    var myOptions = {
        zoom: 2,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    
    /********** get data from database using json jquery **********/
    var link;
    deleteOverlays();
    if (page == 'editlocation') {
        link = "http://localhost/sanurs/web/index.php/profile/get_user_location";
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
                clearOverlays();
                showOverlay();
                setInfoWindow(markersArray[0], markersArray[0].title);
                
                
                
                /*google.maps.event.addListener(markersArray[0], 'dragend', function(event) {
                    geocoder.geocode({
                        'latLng' : event.latLng},
                        function(results, status) {
                            status = google.maps.GeocoderStatus.OK;
                            if (status) {
                                if (results[0]) {
                                    var found = false;
                                    var i = 0;
                                    while (!found) {
                                        if (results[0].address_components[i].types[0] == 'country') {
                                            found = true;
                                        } else {
                                            i++;
                                        }
                                    }
                                    if (markersArray.length > 0) {
                                        // pin cuma bisa 1 lokasi
                                        deleteOverlays();
                                        addMarker('my location', event.latLng, true);
                                        clearOverlays();
                                        showOverlay();
                                        setInfoWindow(markersArray[0], results[0].address_components[i].long_name);
                                        setLocation();
                                    }

                                    name = results[0].address_components[i].long_name;
                                    if (areaLocation.length==0 || areaLocation[0]!=name) {
                                        var geocoder2 = new google.maps.Geocoder();

                                        geocoder2.geocode({
                                            'address' : name},
                                            function(results2,status2) {
                                                if (status2 = google.maps.GeocoderStatus.OK) {
                                                    posisi = results2[0].geometry.location;
                                                    posisi = posisi.toString();
                                                    posisi = posisi.substring(1,posisi.length-1);
                                                    posisi = posisi.split(",", 2);
                                                    area_lat = parseFloat(posisi[0]);
                                                    area_lng = parseFloat(posisi[1]);
                                                    deleteArea();
                                                    addArea(name);
                                                    addArea(area_lat);
                                                    addArea(area_lng);

                                                    $('input[name=area_name]').attr('value', areaLocation[0]);
                                                    $('input[name=area_lat]').attr('value', areaLocation[1]);
                                                    $('input[name=area_lng]').attr('value', areaLocation[2]);
                                                }
                                            }
                                        );
                                    }
                                } else {
                                    alert("daerah tidak terdefinisi, jangan pilih laut, dsb");
                                }
                            } else {
                                alert("Geocode was not successfull for the following reason : " + status);
                            }
                        }
                    );
                });*/
            }
        });
        
        // bisa create pin kalo mapnya diclick
        google.maps.event.addListener(map, 'click', function(event) {
            geocoder.geocode({
                'latLng' : event.latLng},
                function(results, status) {
                    status = google.maps.GeocoderStatus.OK;
                    if (status) {
                        if (results[0]) {
                            var found = false;
                            var i = 0;
                            while (!found) {
                                if (results[0].address_components[i].types[0] == 'country') {
                                    found = true;
                                } else {
                                    i++;
                                }
                            }
                            if (markersArray.length > 0) {
                                // pin cuma bisa 1 lokasi
                                deleteOverlays();
                            }
                            
                            addMarker('my location', event.latLng, true);
                            clearOverlays();
                            showOverlay();
                            setInfoWindow(markersArray[0], results[0].address_components[i].long_name);
                            setLocation();
                            
                            name = results[0].address_components[i].long_name;
                            if (areaLocation.length==0 || areaLocation[0]!=name) {
                                var geocoder2 = new google.maps.Geocoder();
                                
                                geocoder2.geocode({
                                    'address' : name},
                                    function(results2,status2) {
                                        status2 = google.maps.GeocoderStatus.OK;
                                        if (status2) {
                                            posisi = results2[0].geometry.location;
                                            posisi = posisi.toString();
                                            posisi = posisi.substring(1,posisi.length-1);
                                            posisi = posisi.split(",", 2);
                                            area_lat = parseFloat(posisi[0]);
                                            area_lng = parseFloat(posisi[1]);
                                            deleteArea();
                                            addArea(name);
                                            addArea(area_lat);
                                            addArea(area_lng);
                                            
                                            $('input[name=area_name]').attr('value', areaLocation[0]);
                                            $('input[name=area_lat]').attr('value', areaLocation[1]);
                                            $('input[name=area_lng]').attr('value', areaLocation[2]);
                                        }
                                    }
                                );
                            }
                        } else {
                            alert("daerah tidak terdefinisi, jangan pilih laut, dsb");
                        }
                    } else {
                        alert("Geocode was not successfull for the following reason : " + status);
                    }
                }
            );
        });
    } else if (page == 'searchfriend') {
        link = "http://localhost/sanurs/web/index.php/profile/get_all_location";
        $.ajax({
            url: link,
            type: 'POST',
            success: function(msg) {
                if (msg.length > 0) {
                    for (i=0; i<msg.length; i++) {
                        lat = msg[i]['lat'];
                        lng = msg[i]['lng'];
                        listUser = msg[i]['listUser'];
                        latlng = new google.maps.LatLng(lat,lng);
                        if (listUser.length>1) {
                            addMarker(listUser.length+' people', latlng, false);
                        } else {
                            addMarker(listUser[0]['name'], latlng, false);
                        }
                        for(j=0; j<listUser.length; j++) {
                            var usertemp = [listUser.length, listUser[j]['id'], listUser[j]['name'], listUser[j]['year']];
                            userArray.push(usertemp);
                        }
                    }
                }
                clearOverlays();
                showOverlay();
                for (i=0; i<markersArray.length; i++) {
                    var contentString = '';
                    var awal = i;
                    if (i>0) {
                        var a = i-1;
                        var num = userArray[a][0];
                        awal = a+num;
                    }
                    for (j=awal; j<i+userArray[i][0]; j++) {
                        contentString += '<a class="link" href="profile/user/'+ userArray[j][1] +'">'+ userArray[j][2] +' ('+ userArray[j][3] +')</a><br/>';
                    }
                    setInfoWindow(markersArray[i], contentString);
                }
                var mcOptions = {gridSize: 50, maxZoom: 15};
                markerCluster = new MarkerClusterer(map, markersArray, mcOptions);
            }
        });
    }
    /********** selesai json jquery **********/
}

/*
 * untuk menambah marker overlay (objek) yang ada pada peta
 * marker posisi lokasi objek disimpan dalam markersArray
 */
function addMarker(title, location, draggable) {
    var marker = new google.maps.Marker({
        position : location,
        title : title,
        draggable : draggable
    });
    
    if (draggable) {
        //kalo draggable=true, berarti marker bisa digeser (update posisi)
        google.maps.event.addListener(marker, 'dragend', function(event){
            marker.setPosition(event.latLng);
            setLocation();
        });
    }
    
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
 * melakukan geocode terhadap lokasi yang dimasukkan oleh pengguna
 * geocode = mengubah alamat (dalam bahasa manusia) menjadi koordinat latitude-longitude
 */
function geocodeLocation() {
    if ($('input[name=location]').attr('value') != null) {
        var address = $('input[name=location]').attr('value');
        geocoder.geocode(
            {'address' : address},
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var found = false;
                    var i = 0;
                    if (results[0].address_components[i].types[0] == "natural_feature") {
                        alert("daerah tidak terdefinisi, jangan pilih laut, dsb");
                    } else {
                        do {
                            if (results[0].address_components[i].types[0] == "country") {
                                found = true;
                            } else {
                                i++;
                            }
                        } while (!found);
                        map.setCenter(results[0].geometry.location);
                        deleteOverlays();
                        addMarker('my location', results[0].geometry.location, true);
                        clearOverlays();
                        showOverlay();
                        setInfoWindow(markersArray[0], results[0].address_components[i].long_name);
                        setLocation();
                        
                        name = results[0].address_components[i].long_name;
                        if (areaLocation.length==0 || areaLocation[0]!=name) {
                            var geocoder2 = new google.maps.Geocoder();
                            geocoder2.geocode({
                                'address' : name},
                                function(results2,status2) {
                                    if (status2 = google.maps.GeocoderStatus.OK) {
                                        posisi = results2[0].geometry.location;
                                        posisi = posisi.toString();
                                        posisi = posisi.substring(1,posisi.length-1);
                                        posisi = posisi.split(",", 2);
                                        area_lat = parseFloat(posisi[0]);
                                        area_lng = parseFloat(posisi[1]);
                                        deleteArea();
                                        addArea(name);
                                        addArea(area_lat);
                                        addArea(area_lng);

                                        $('input[name=area_name]').attr('value', areaLocation[0]);
                                        $('input[name=area_lat]').attr('value', areaLocation[1]);
                                        $('input[name=area_lng]').attr('value', areaLocation[2]);
                                    }
                                }
                            );
                        }
                        
                    }
                } else {
                    alert("Geocode was not successfull for the following reason : " + status);
                }
            }
        );
    }
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
    if (markersArray.length > 0) {
        latlngStr = markersArray[0].position.toString();
        latlngStr = latlngStr.substring(1,latlngStr.length-1);
        latlngStr = latlngStr.split(",", 2);
        lat = parseFloat(latlngStr[0]);
        lng = parseFloat(latlngStr[1]);
    } else {
        lat = 0;
        lng = 0;
    }
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

/*
 * untuk membuat InfoWindow pada marker
 */
function setInfoWindow(marker, content) {
    var stringContent = '<div style="max-height:100px">'+content+'</div>';
    
    var infowindow = new google.maps.InfoWindow({
        content: stringContent
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });
}

/*
 * memasukkan data baru ke dalam areaLocation
 */
function addArea(data) {
    areaLocation.push(data);
}

/*
 * menghapus semua isi areaLocation
 */
function deleteArea() {
    if (areaLocation) {
        for (i in areaLocation) {
            areaLocation[i] = "";
        }
        areaLocation.length = 0;
    }
}

function deleteUserLocation() {
    deleteOverlays();
    setLocation();
}