<?php

function alerts($id)
{
    $host = "127.0.0.1";
    $user = "root";
    $pw = "";
    $db = "my_streetalert";

    $conn = new mysqli($host, $user, $pw, $db);

    if($id == 0)
    $query = "SELECT * FROM alerts";
    else
    {
        $query = "SELECT * FROM alerts WHERE id_type=" . $id;
    }

    return $conn -> query($query);
}

function cercaComune($comune)
{
    $host = "127.0.0.1";
    $user = "root";
    $pw = "";
    $db = "my_streetalert";

    $conn = new mysqli($host, $user, $pw, $db);

    $query = "SELECT * FROM municipalities WHERE name='$comune'";

    return $conn -> query($query);
}

?>