<?php

require('query.php');
getCoords();

function getCoords(){
    $lat; $lon; $state;
    $data = array();

    $getCoords = alerts();

    foreach($getCoords as $alert){
        $lat = $alert['lat'];
        $lon = $alert['lon'];
        $state = $alert['state'];

        $data[] = array('lat' => $lat, 'lon' => $lon, 'state' => $state);
    }

    $jsonCoords = json_encode($data);
    echo $jsonCoords;
}

?>