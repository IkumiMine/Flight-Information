<?php
session_start();

if(isset($_SESSION['flight'])) {

    //if latitude and longitude is not null, assign them in array and echo it
    if (isset($_SESSION['flight']['data'][0]['live']['latitude']) && isset($_SESSION['flight']['data'][0]['live']['longitude'])) {
        $flightLocation = array(
            'lat' => $_SESSION['flight']['data'][0]['live']['latitude'],
            'lng' => $_SESSION['flight']['data'][0]['live']['longitude']
        );
        echo json_encode($flightLocation);
    } else {
        return false;
    }
}
