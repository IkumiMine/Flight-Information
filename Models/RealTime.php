<?php
namespace APIproject\Models;

class RealTime
{
    //get realtime flights
    public function realTimeFlight($flightNum)
    {
        $queryString = http_build_query([
            'access_key' => '',
            'flight_iata' => $flightNum
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.aviationstack.com/v1/flights', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $api_result = json_decode($json, true);
        return $api_result;
    }
}