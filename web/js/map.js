var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;

/*
 * initialize map
 */
function initialize() {
    geocoder = new google.maps.Geocoder();
    //var latlng = new google.maps.LatLng(-34.397, 150.644);
    var latlng = new google.maps.LatLng(-6.20336, 106.8437);
    //var latlng = new google.maps.LatLng(37.339085, -121.8914807);
    var myOptions = {
        zoom: 10,
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
            
function codeAddress() {
    var address = document.getElementById("address").value;
    geocoder.geocode(
    {
        'address' : address
    },
    function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            marker = new google.maps.Marker({
                map : map,
                position : results[0].geometry.location
            });
        } else {
            alert("Geocode was not successfull for the following reason : " + status);
        }
    }
    );
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