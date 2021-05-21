function initializeMap() {
    let map;
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

    let flightInput = document.getElementById('flightNum').value;

    //If flight number input is filled, run the searchFlight function;
    if(flightInput){
        addMarker();
    }

    //function to get lat and lng of the selected flight
    function addMarker() {
        let flight, marker;
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
        ajax.open("GET", "components/locationcode.php", true);
        ajax.send();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {

                //If ajax responsetext is not null and empty, set a marker
                if(ajax.responseText !== null && ajax.responseText !== ""){
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
}

initializeMap();