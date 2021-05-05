<?php
session_start();
use APIproject\Models\{RealTime, Output};
require_once 'vendor/autoload.php';

//function to format date
function dateFormat($time){
    $original_time = new DateTime($time);
    $formatted_time = date_format($original_time, 'Y-m-d h:i:s A');
    return $formatted_time;
}

//when the search button is clicked,  run validation, search flight, set session
if(isset($_GET['search'])){
    if($_GET['flightNum'] == ""){
        $error = "Please enter your flight number";
    } else {
        $newRealTIme = new RealTime();
        $selectedFlight = $newRealTIme->realTimeFlight($_GET['flightNum']);
        if($selectedFlight == null){
            $error = "Sorry, the flight you are looking for is currently unavailable";
        } else {
            $_SESSION['flight'] = $selectedFlight;
            if (isset($selectedFlight['data'][0]['live']['latitude']) && isset($selectedFlight['data'][0]['live']['longitude'])) {
                $error = "You can check real time flight location on map.";
            } else {
                $error = "Sorry, the flight location is unavailable.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find Your Flight Information</title>
        <!--bootstrap 5.0.0-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!--custom css-->
        <link rel="stylesheet" href="css/style.css">
        <!--icons-->
        <link href="css/all.css" rel="stylesheet">
    </head>
    <body>
        <!--Header-->
        <?php include_once 'header.php' ?>

        <main>
            <div class="d-flex flex-column align-items-center py-5 h-100" id="flight">
                <h1 class="d-none">Find Flight</h1>
                <input type="hidden" id="session-flight" class="d-none" id="session" value="<?= isset($_SESSION['flight']) ? $_SESSION['flight'] : ""; ?>">

                <!--Search form-->
                <?php include_once 'search-form.php' ?>

                <!--Info output-->
                <div class="card p-3 shadow-sm bg-main-content" id="output">
                    <?php if(!isset($selectedFlight)) {
                            include_once 'output-template.php';
                        } else {
                            $newOutput = new Output();
                            $output = $newOutput->content(
                                $selectedFlight['data'][0]['flight']['iata'],
                                $selectedFlight['data'][0]['airline']['name'],
                                $selectedFlight['data'][0]['airline']['iata'],
                                $selectedFlight['data'][0]['departure']['iata'],
                                $selectedFlight['data'][0]['arrival']['iata'],
                                $selectedFlight['data'][0]['departure']['airport'],
                                dateFormat($selectedFlight['data'][0]['departure']['scheduled']),
                                dateFormat($selectedFlight['data'][0]['departure']['estimated']),
                                dateFormat($selectedFlight['data'][0]['departure']['actual']),
                                $selectedFlight['data'][0]['departure']['terminal'],
                                $selectedFlight['data'][0]['departure']['gate'],
                                $selectedFlight['data'][0]['departure']['timezone'],
                                $selectedFlight['data'][0]['arrival']['airport'],
                                dateFormat($selectedFlight['data'][0]['arrival']['scheduled']),
                                dateFormat($selectedFlight['data'][0]['arrival']['estimated']),
                                dateFormat($selectedFlight['data'][0]['arrival']['actual']),
                                $selectedFlight['data'][0]['arrival']['terminal'],
                                $selectedFlight['data'][0]['arrival']['gate'],
                                $selectedFlight['data'][0]['arrival']['timezone']
                            );
                            echo $output;
                    } ?>
                </div><!--End of info output-->
            </div>

            <!--Google Maps-->
            <section class="container-fluid">
                    <div class="mx-auto my-4" id="map"></div>
            </section>
            <!--End of Google Maps-->
        </main>

        <!-- Footer -->
        <?php include_once 'footer.php'; ?>

        <!--jQuery-->
        <script src="js/jquery-3.5.1.min.js"></script>
        <!--bootstrap js-->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--Google Maps API-->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key="></script>
        <!--custom js-->
        <script async defer src="js/googlemap.js"></script>
    </body>
</html>
