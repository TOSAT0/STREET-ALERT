<?php
    include "func.php";

    $states = array("NEW", "SEEN", "SOLVED");
    $alerts = get_alerts($states);
    
    $alerts_array = array();
    foreach($alerts as $row){
        array_push($alerts_array, $row);
    }
    $response = array("alerts" => $alerts_array);

    header('Content-Type: application/json');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    echo json_encode($response);
?>