<?php
    include "func.php";

    $conn = connect();
    $fp=fopen("comuni.csv","r");
    
    $i = 1;
    $query = "INSERT INTO comuni VALUES";
    while(!feof($fp)){
        $array = fgetcsv($fp);
        if($array != null){
            $sign = $array[0];
            $name = $array[1];
            $lat = $array[2];
            $lon = $array[3];

            $query .= "($i,\"$sign\",\"$name\",$lat,$lon)";
            if($i != 7900)
                $query .= ",";
            $i++;
        }
    }
    $conn->query($query);

    echo $query;
?>
