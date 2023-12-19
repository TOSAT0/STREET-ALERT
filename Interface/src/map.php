<?php require('query.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

</head>

<style>
    
</style>
<body>

    <div id="map"></div>
    
</body>

<script>
    var jsData = <?php echo getCoords(); ?>
</script>

<script type="module" src="js/index.js" >
    
</script>

</html>

<?php

    function getCoords(){
        $lat; $lon; $state;
        $data = array();

        $getCoords=alerts();

        foreach($getCoords as $alert){
            $lat = $alert['lat'];
            $lon = $alert['lon'];
            $state = $alert['state'];

            $data[] = array('lat' => $lat, 'lon' => $lon, 'state' => $state);
        }

        $jsonCoords = json_encode($data);

        return $jsonCoords;
    }
    
?>