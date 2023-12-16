<?php
    include "func.php";

    $conn = connect();

    $fp=fopen("comuni.csv","r");
    $i = 1;
    while(!feof($fp)){
        $array = fgetcsv($fp);
        if($array != null){
            $sigla = $array[0];
            $nome = $array[1];
            $lat = $array[2];
            $lon = $array[3];
        }
        $conn->query("INSERT INTO comuni VALUES($i,\"$sigla\",\"$nome\",$lat,$lon)");
        $i++;
    }

    echo "END";
?>