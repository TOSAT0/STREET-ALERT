<?php
    include "func.php";

    $id_alert = alert_exist($_GET['lat'], $_GET['lon']);

    if($id_alert == -1){
        report("nuovo", $_GET['lat'], $_GET['lon'], "", 0, 0);
    }else{
        modify($id_alert);
    }
    
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

?>
