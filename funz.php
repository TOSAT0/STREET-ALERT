<?php

    function connect(){
        try{
            return new mysqli("localhost", "root", "", "my_streetalert");
        }catch(Exception $e){
            die("ops");
        }
    }

    function login($user, $psw){
        $conn = connect();

        if(user_exist($user)){
            //boh connetti
        }
    }

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

    function report($photo, $lat, $lon, $description, $id_user, $id_type){
        $conn = connect();

        try{
            $conn->query("INSERT INTO alerts VALUES(NULL, $photo, $lat, $lon, '$description', 'NEW', 'NOW(), $id_user, $id_type)");
        }catch(Exception $e){
            die("ops");
        }
    }

    function alert_exist($lat, $lon){
        $conn = connection();

        $alerts = get_alerts("ALL");
        foreach($alerts as $row){
            if($row['lat']-0.000135 >= $lat && $row['lat']+0.000135 <= $lat && $row['lon']-0.000193 >= $lon && $row['lon']+0.000193 <= $lon)
        }
        /*
            LAT: 110.95km -> 0.000135
            LON: 77.610km -> 0.000193
        */
    }

    function get_alerts($state){
        $conn = connection();

        try{
            if($state == "ALL")
                return $conn->query("SELECT * FROM alerts");
            else
                return $conn->query("SELECT * FROM alerts WHERE state='$state'");
        }catch(Execption $e){
            die("ops");
        }
    }

?>