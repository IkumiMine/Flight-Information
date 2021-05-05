function initializeMap() {
    let map, marker, flight;
    const mapOptions = {
        zoom: 1,
        center: { lat: 0, lng: 0 },
        //style is retrieved from https://developers.google.com/maps/documentation/javascript/examples/style-array
        styles: [
            { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
            {
                featureType: "administrative.locality",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d59563" }],
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d59563" }],
            },
            {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{ color: "#263c3f" }],
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [{ color: "#6b9a76" }],
            },
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [{ color: "#38414e" }],
            },
            {
                featureType: "road",
                elementType: "geometry.stroke",
                stylers: [{ color: "#212a37" }],
            },
            {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [{ color: "#9ca5b3" }],
            },
            {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [{ color: "#746855" }],
            },
            {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [{ color: "#1f2835" }],
            },
            {
                featureType: "road.highway",
                elementType: "labels.text.fill",
                stylers: [{ color: "#f3d19c" }],
            },
            {
                featureType: "transit",
                elementType: "geometry",
                stylers: [{ color: "#2f3948" }],
            },
            {
                featureType: "transit.station",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d59563" }],
            },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{ color: "#17263c" }],
            },
            {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [{ color: "#515c6d" }],
            },
            {
                featureType: "water",
                elementType: "labels.text.stroke",
                stylers: [{ color: "#17263c" }],
            }
        ]
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    //I tried to check if session is exist or not.
    //var session = document.getElementById('session');
    //if(session !== "" ){
        window.addEventListener('load',searchFlight);
    //}

    //function to get lat and lng of the selected flight
    function searchFlight() {
        //console.log("getting data of flight");
        var ajax;
        try {
            ajax = new XMLHttpRequest();
        } catch (e) {
            try {
                ajax = new ActiveXObject("Msxm12.XMLHTTP");
            } catch (e) {
                try {
                    ajax = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Error retrieving location.");
                    return false;
                }
            }
        }
        ajax.open("GET", "locationcode.php", true);
        ajax.send();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var latlng = JSON.parse(ajax.responseText);
                flight = new google.maps.LatLng(latlng.lat, latlng.lng);

                //Marker
                marker = new google.maps.Marker({
                    position: flight,
                    map: map,
                    icon: 'images/location-pin-mid.png'
                });
            }
        }
    }
}

initializeMap();