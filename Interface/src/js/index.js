import {redIcon, greenIcon, blueIcon} from './markers.js';
// import {layerControl} from './layers.js';

var map = L.map('map').fitWorld()

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map)

// metodo per geolocalizzare il dispositivo
// e settare la visuale della mappa
map.locate({setView: true, maxZoom: 16})

// RICHIESTA ASINCRONA AL SERVER 
// vado ad effettuare una richiesta asincrona in POST 
// per prendere le coordinate + lo stato della segnalazione
// alla pagina 'server.php' 

let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
    // se la richiesta è andata a buon fine scarico i dati ricevuti
    // nel formato JSON in una variabile jsData, chiamando la funzione setData()
    if (this.readyState == 4 && this.status == 200) {
        setData(JSON.parse(this.response))
        onLocationFound()
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

        // lo stato della segnalazione serve per impostare 
        // i diversi marker all'interno della mappa
        if(state == 'NEW')
            marker = L.marker([lat, lng], {icon: redIcon}).addTo(map)
        else if(state == 'SEEN')
            marker = L.marker([lat, lng], {icon: blueIcon}).addTo(map)
        else
            marker = L.marker([lat, lng], {icon: greenIcon}).addTo(map)
        
        index++;
        
    }
}

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);
