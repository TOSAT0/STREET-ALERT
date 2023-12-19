<!DOCTYPE html>
<html>
<body>
<h1>HTML Geolocation</h1>
<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
const x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(processPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function processPosition(position) {
  // x.innerHTML = "Latitude: " + position.coords.latitude + 
  // "<br>Longitude: " + position.coords.longitude;

  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "server.php", true);

  let formdata = new FormData();
  formdata.append("latitude", position.coords.latitude);
  formdata.append("longitude", position.coords.longitude);
  
  xhttp.send(formdata);
}
</script>

</body>
</html>