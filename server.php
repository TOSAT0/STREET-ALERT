<?php
    include "func.php";

    $same = alert_exist($_GET['lat'], $_GET['lon'], $_GET['error']);

    if($_GET['status'] == "report"){
        if(sizeof($same) == 0){
            report("photo", $_GET['lat'], $_GET['lon'], $_GET['error'], "", 0, 0);
            $response = array("status" => "ok");
        }else{
            $response = array("status" => "not_ok", "same" => $same);
        }
    }
    if($_GET['status'] == "exist"){
        modify($_GET['id_alert']);
        $response = array("status" => "ok");
    }
    if($_GET['status'] == "not_exist"){
        report("photo", $_GET['lat'], $_GET['lon'], $_GET['error'], "", 0, 0);
        $response = array("status" => "ok");
    }
    
    header('Content-Type: application/json');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    echo json_encode($response);

    /* REQUEST STATUS:
        report      -> check if the alert already exist
        exist       -> modify the alert in the table
        not_exist   -> add the alert in the table
    */
?>