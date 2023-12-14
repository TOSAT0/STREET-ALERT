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
                $conn->query("INSERT INTO users(email,password) VALUES('$user','$psw')");
            }catch(Exception $e){
                die("ops");
            }
        }
    }

    function user_exist($user){
        $conn = connect();

        try{
            $ris = $conn->query("SELECT * FROM users WHERE user='$user'");
        }catch(Exception $e){}
        if(mysqli_num_rows($ris) > 0)
            return true;
        return false;
    }

    function report($photo, $lat, $lon, $description, $id_user, $id_type){
        $conn = connect();

        try{
            $conn->query("INSERT INTO alerts(photo, lat, lon, description, state, date, id_user, id_type) VALUES($photo, $lat, $lon, '$description', 'NEW', 'NOW(), $id_user, $id_type)");
        }catch(Exception $e){}
    }

    function alert_exist($lat, $lon){
        
    }

?>