//import {redIcon, greenIcon, blueIcon} from './markers.js';
//import {layerControl} from './layers.js';

var map = L.map('map');
map.remove();

var map = L.map('map');
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let marker, circle;

navigator.geolocation.watchPosition(success, error);

function success(pos){

    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;

    marker = L.marker([lat, lng]).addTo(map);
    circle = L.circle([lat, lng], {radius: accuracy}).addTo(map)

    map.setView([lat, lng], 13);

}
function error(err){

    if(err.code === 1){
        alert("Please allow geolocation access");
    }else{
        alert("Cannto get current location");
    }

}

//layerControl.addTo(map);