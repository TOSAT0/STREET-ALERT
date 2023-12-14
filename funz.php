<?php

    // CONNECTION TO THE DATABASE
    function connect(){
        try{
            return new mysqli("localhost", "root", "", "my_streetalert");
        }catch(Exception $e){
            die("ops");
        }
    }

    // LOGIN
    function login($user, $psw){
        $conn = connect();

        if(user_exist($user)){
            //boh connetti
        }
    }

    // ADD A NEW USER TO THE USERS TABLE
    function sign_up($user, $psw){
        $conn = connect();

        if(!user_exist($user)){
            try{
                $conn->query("INSERT INTO VALUES(NULL, '$user','$psw')");
            }catch(Exception $e){
                die("ops");
            }
        }
    }

    // CHECK IF THE USER ALREADY EXISTS
    function user_exist($user){
        $conn = connect();

        try{
            $ris = $conn->query("SELECT * FROM users WHERE user='$user'");
        }catch(Exception $e){
            die("ops");
        }
        if(mysqli_num_rows($ris) > 0)
            return true;
        return false;
    }

    // ADD A NEW ALERT TO THE ALERTS TABLE
    function report($photo, $lat, $lon, $description, $id_user, $id_type){
        $conn = connect();

        try{
            $conn->query("INSERT INTO alerts VALUES(NULL, $photo, $lat, $lon, '$description', 'NEW', 'NOW(), $id_user, $id_type)");
        }catch(Exception $e){
            die("ops");
        }
    }

    // CHECK IF THE ALERT ALREADY EXISTS
    function alert_exist($lat, $lon){
        $conn = connection();

        $alerts = get_alerts("ALL");
        foreach($alerts as $row){
            if($row['lat']-0.000135 >= $lat && $row['lat']+0.000135 <= $lat 
            && $row['lon']-0.000193 >= $lon && $row['lon']+0.000193 <= $lon)
                return true;
        }
        return false;
    }

    // GET A SPECIFIC ALERT CATEGORY
    function get_alerts($states){
        $conn = connection();

        $alerts = "";
        foreach($states as $state){
            try{
                $alerts += $conn->query("SELECT * FROM alerts WHERE state='$state'");
            }catch(Execption $e){
                die("ops");
            }
        }
        return $alerts;
    }

    // PRINT THE REPORTING TABLE
    public print_table($states){
        $alerts = get_alerts($states);

        echo "<table>";
        foreach($alerts as $row){
            echo "<tr class='".$row['state']."'>";
            echo "<td>".$row['']."</td>";
            echo "<td>".$row['']."</td>";
            echo "<td>".$row['']."</td>";
            echo "<td>".$row['']."</td>";
            echo "</tr>"

            // photo
            // via
            // id_type
            // description
        }
        echo "</table>";
    }

?>

<!--EXTRA INFO
    LAT: 110.95km -> 0.000135
    LON: 77.610km -> 0.000193
-->