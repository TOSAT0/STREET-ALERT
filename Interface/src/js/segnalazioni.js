import { map } from "./index.js";
import { redIcon, greenIcon, blueIcon, yellowIcon } from './markers.js';

//--------------------- RICHIESTA ASINCRONA AL SERVER ---------------------
// vado ad effettuare una richiesta asincrona in POST 
// per prendere le coordinate + lo stato della segnalazione
// alla pagina 'server.php' 
let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function()
{
    // se la richiesta è andata a buon fine scarico i dati ricevuti
    // nel formato JSON in una variabile jsData, chiamando la funzione setData()
    if (this.readyState == 4 && this.status == 200) {
        setData(JSON.parse(this.response))
        onLocationFound()
    }
}

xhttp.open("GET", "server.php?send=getCoords", true)
xhttp.send()

//--------------------- RICHIESTA ASINCRONA AL SERVER ---------------------

let jsData;

function setData(a)
{
    jsData = a
}

export function onLocationFound()
{
    let marker, index = 0, lat, lng, state

    while(index < jsData.length)
    {

        lat = jsData[index].lat,
        lng = jsData[index].lon,
        state = jsData[index].state

        // lo stato della segnalazione serve per impostare 
        // i diversi marker all'interno della mappa
        if(state == 'NEW')
            marker = L.marker([lat, lng], {icon: redIcon}).addTo(map)
        if(state == 'SEEN')
            marker = L.marker([lat, lng], {icon: yellowIcon}).addTo(map)
        if(state == 'SOLVED')
            marker = L.marker([lat, lng], {icon: greenIcon}).addTo(map)
        
        index++;
        
    }
}

export function onLocationError(e)
{
    alert(e.message);
}