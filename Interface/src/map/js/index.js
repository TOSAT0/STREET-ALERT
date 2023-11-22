var map = L.map('map');
map.setView([45.665853, 12.243057], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

import {redIcon, greenIcon, blueIcon} from './markers.js';
import {layerControl} from './layers.js';

let marker, circle;

navigator.geolocation.watchPosition(success, error);

function success(pos){

    const lat = 45.665853;
    const lng = 12.243057;
    const accuracy = pos.coords.accuracy;

    //marker = L.marker([lat, lng], {icon: redIcon}).addTo(map);
    //circle = L.circle([lat, lng], { radius: 500 , color:'red' } ).addTo(map);

    // marker = L.marker([45.612114, 12.139598]).addTo(map);
    // circle = L.circle([45.612114, 12.139598], { radius: accuracy } ).addTo(map);

    map.setView([lat, lng]);

}
function error(err){

    if(err.code === 1){
        alert("Please allow geolocation access");
    }else{
        alert("Cannto get current location");
    }

}

layerControl.addTo(map);