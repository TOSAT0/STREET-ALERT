export var map = L.map('map').fitWorld()

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map)

// metodo per geolocalizzare il dispositivo
// e settare la visuale della mappa
map.setMinZoom(6);
map.locate({setView: true, maxZoom: 16})
map.on('locationerror', onLocationError)

//---------------------------- STAMPA SEGNALAZIONI DAL DATABASE ----------------------------
import { onLocationFound, onLocationError } from './segnalazioni.js'
onLocationFound
onLocationError
//---------------------------- STAMPA SEGNALAZIONI DAL DATABASE ----------------------------

//---------------------------- RICERCA COMUNI ----------------------------
import { cercaComune } from './cerca_comune.js'
cercaComune
//---------------------------- RICERCA COMUNI ----------------------------
