<?php
    include "func.php";

    if(alert_exist($_GET['lat'], $_GET['lon'])){
        report("no nuovo", $_GET['lat'], $_GET['lon'], "", 0, 0);
    }else{
        report("nuovo", $_GET['lat'], $_GET['lon'], "", 0, 0);
    }
    
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

?>
