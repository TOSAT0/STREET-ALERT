<?php

require('query.php');

if(($_GET['send']) == "cercaComune")
{
    $comune = $_GET['comune'];

    if($comune == "")
    {
        echo json_encode("Compila il campo...");
    }else
    {
        getComune($comune);
    }
}

if(($_GET['send']) == "getCoords")
{
    getCoords();
}

function getComune($comune)
{
    $ris = cercaComune($comune);

    if($ris->num_rows > 0)
    {
        foreach($ris as $v)    
        $coords = array('lat' => $v['lat'], 'lon' => $v['lon']);

        $json = json_encode($coords);
        echo $json;
    }else
    {
        echo json_encode("Nessun comune trovato...");
    }
}

function getCoords()
{
    $lat; $lon; $state;
    $data = array();

    // prendo i dati dal database attraverso la funzione 
    // alerts() che va ad effettuare la query 
    $getCoords = alerts();

    foreach($getCoords as $alert)
    {
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