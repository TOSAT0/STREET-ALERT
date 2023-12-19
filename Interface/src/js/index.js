import {redIcon, greenIcon, blueIcon} from './markers.js';
// import {layerControl} from './layers.js';

var map = L.map('map').fitWorld()

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map)

map.locate({setView: true, maxZoom: 16})

let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        setData(JSON.parse(this.response))
        // onLocationFound()
    }
}

xhttp.open("POST", "server.php", true)
xhttp.send()

let jsData;

function setData(a){
    jsData = a
}

function onLocationFound() {
    let marker, index = 0, lat, lng, state

    while(index < jsData.length){

        lat = jsData[index].lat,
        lng = jsData[index].lon,
        state = jsData[index].state

        if(state == 'Nuovo')
            marker = L.marker([lat, lng], {icon: redIcon}).addTo(map)
        else if(state == 'Visto')
            marker = L.marker([lat, lng], {icon: blueIcon}).addTo(map)
        else
            marker = L.marker([lat, lng], {icon: greenIcon}).addTo(map)
        
        index++;
        
    }
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);
