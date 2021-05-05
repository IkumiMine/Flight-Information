<?php
session_start();

if(isset($_SESSION['flight'])){

    //if latitude and longitude is not null, assign them in array
    if (isset($_SESSION['flight']['data'][0]['live']['latitude']) && isset($_SESSION['flight']['data'][0]['live']['longitude'])) {
        $flightLocation = array(
            'lat' => $_SESSION['flight']['data'][0]['live']['latitude'],
            'lng' => $_SESSION['flight']['data'][0]['live']['longitude']
        );
    } else {
        $flightLocation = "";
    }

    //if $flightLocation is not empty, echo the data for ajax
    if($flightLocation == ""){
        return false;
    } else {
        echo json_encode($flightLocation);
    }
}
