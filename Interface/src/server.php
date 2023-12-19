<?php

require('query.php');
getCoords();

function getCoords(){
    $lat; $lon; $state;
    $data = array();

    // prendo i dati dal database attraverso la funzione 
    // alerts() che va ad effettuare la query 
    $getCoords = alerts();

    foreach($getCoords as $alert){
        $lat = $alert['lat'];
        $lon = $alert['lon'];
        $state = $alert['state'];

        $data[] = array('lat' => $lat, 'lon' => $lon, 'state' => $state);
    }

    // trasformo l'array associativo in formato JSON 
    $jsonCoords = json_encode($data);
    echo $jsonCoords;
}

?>