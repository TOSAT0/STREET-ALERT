<?php

function alerts(){

    $host = "127.0.0.1";
    $user = "root";
    $pw = "";
    $db = "streetalert";

    $conn = new mysqli($host, $user, $pw, $db);

    $alerts = $conn -> query('SELECT * FROM alerts');

    return $alerts;

}

?>