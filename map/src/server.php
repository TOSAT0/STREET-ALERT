<?php
session_start();
require('query.php');

if(isset($_GET['alerts-type-filter']))
{
    $_SESSION['filter'] = $_GET['filter'];
    header('Location:map.html');
}

if(isset($_GET['send']))
{
    if(($_GET['send']) == "getAlerts")
    {
        getAlerts();
    }
}

function getAlerts()
{
    $lat; $lon; $state; $id_alert; $description;
    $data = array();

    // prendo i dati dal database attraverso la funzione 
    // alerts() che va ad effettuare la query
    if(isset($_SESSION['filter']))
    {
        $getAlerts = alerts($_SESSION['filter']);
    }
    else
        $getAlerts = alerts(0);

    foreach($getAlerts as $alert)
    {
        $lat = $alert['lat'];
        $lon = $alert['lon'];
        $state = $alert['state'];
        $id_alert = $alert['id_alert'];
        $description = $alert['description'];

        $data[] = array('lat' => $lat, 'lon' => $lon, 'state' => $state, 'id_alert' => $id_alert, 'description' => $description);
    }

    // trasformo l'array associativo in formato JSON 
    $jsonAlerts = json_encode($data);
    echo $jsonAlerts;
}
?>