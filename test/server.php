<?php
    include "func.php";

    if($_GET['status'] == "report"){
        $id_alert = alert_exist($_GET['lat'], $_GET['lon']);
        
        if($id_alert == -1){
            report("photo", $_GET['lat'], $_GET['lon'], "", 0, 0);
            $response = array("status" => "ok");
        }else{
            $response = array("status" => "not_ok");
        }
    }
    if($_GET['status'] == "exist"){
        $id_alert = alert_exist($_GET['lat'], $_GET['lon']);
        modify($id_alert);
        $response = array("status" => "ok");
    }
    if($_GET['status'] == "not_exist"){
        report("photo", $_GET['lat'], $_GET['lon'], "", 0, 0);
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