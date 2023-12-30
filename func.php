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
    function report($photo, $lat, $lon, $error, $description, $id_user, $id_type){
        $conn = connect();

        try{
            $conn->query("INSERT INTO alerts VALUES(NULL, '$photo', NOW(), $lat, $lon, $error, '$description', 'NEW', DEFAULT, $id_user, $id_type)");
        }catch(Exception $e){
            die("ops");
        }
    }

    // INCREASE THE NUMBER OF REPORT
    function modify($id_alert, $lat, $lon){
        $conn = connect();
        
        try{
            $conn->query("UPDATE alerts SET lat = $lat, lon = $lon, times = times+1 WHERE id_alert = $id_alert");
        } catch(Exception $e){
            die("ops");
        }
    }

    // CHECK IF THE ALERT ALREADY EXISTS
    function alert_exist($lat, $lon, $error){
        $conn = connect();
        $same = array();
        $alerts = get_alerts(array("NEW","SEEN","SOLVED"));
        foreach($alerts as $row){
            $dis = rad2deg(acos(sin(deg2rad($lat)) * sin(deg2rad($row['lat'])) + cos(deg2rad($lat)) * cos(deg2rad($row['lat'])) * cos(deg2rad($lon - $row['lon'])))) * 69090 * 1.609344;
            if($dis <= $error + $row['error'])
                array_push($same, $row);
        }
        return $same;
    }

    // GET A SPECIFIC ALERT CATEGORY
    function get_alerts($states) {
        $conn = connect();
        $stateList = implode("','", $states);
        
        try {    
            return $conn->query("SELECT * FROM alerts WHERE state IN ('$stateList')");
        } catch (Exception $e) {
            die("ops");
        }
    }

    // PRINT THE REPORTING TABLE
    function print_table($states){
        $alerts = get_alerts($states);

        echo "<table>";
        foreach($alerts as $row){
            echo "<tr class='".$row['state']."'>";
                echo "<td>PHOTO</td>";
                echo "<td>".$row['lat']."-".$row['lon']."</td>";
                echo "<td>".$row['id_type']."</td>";
                echo "<td>".$row['description']."</td>";
                if($row['state'] == "NEW" || $row['state'] == "SEEN")
                    echo "<td><input type='button' name='".$row['state']."' value='✓'/></td>";
                elseif($row['state' == "SOLVED"] || $row['state'] == "SEEN")
                    echo "<td><input type='button' name='".$row['state']."' value='✗'/></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

?>
