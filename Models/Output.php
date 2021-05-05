<?php
namespace APIproject\Models;

class Output {

    public function content($flightIata, $airlineName, $airlineIata, $depIata, $arrIata, $depAirport, $depSch, $depEst, $depAct, $depTer, $depGate, $depTimezone, $arrAirport, $arrSch, $arrEst, $arrAct, $arrTer, $arrGate, $arrTimezone) {
        $content = "<div class='d-flex card-title border-bottom border-3'>
    <div>
        <h2>$flightIata</h2>
        <p>$airlineName ($airlineIata)</p>
    </div>
    <div class='flex-grow-1 text-center'>
        <p class='fs-2 pt-2 m-0'>$depIata <i class='fas fa-chevron-right fa-fw'></i> $arrIata</p>
    </div>
</div>
<div class='row'>
    <div class='col-lg-6 text-center'>
        <h3 class='fs-5'><i class='fas fa-plane-departure fa-fw'></i> Departure</h3>
        <p class='fs-4'>$depAirport</p>
        <p>Scheduled: $depSch</p>
        <p>Estimated: $depEst</p>
        <p>Actual: $depAct</p>
        <div class='row'>
            <p class='col-lg-6'>Terminal: $depTer</p>
            <p class='col-lg-6'>Gate: $depGate</p>
        </div>
        <p>Timezone: $depTimezone</p>
    </div>
    <div class='col-lg-6 text-center'>
        <h3 class='fs-5'><i class='fas fa-plane-arrival fa-fw'></i> Arrival</h3>
        <p class='fs-4'>$arrAirport</p>
        <p>Scheduled: $arrSch</p>
        <p>Estimated: $arrEst</p>
        <p>Actual: $arrAct</p>
        <div class='row'>
            <p class='col-lg-6'>Terminal: $arrTer</p>
            <p class='col-lg-6'>Gate: $arrGate</p>
        </div>
        <p>Timezone: $arrTimezone</p>
    </div>
</div>";
        return $content;
    }
}
?>
