export var map = L.map('map').fitWorld()

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map)

const key = 'gjvlgfcX14HAxeJhV36m'

L.control.maptilerGeocoding({ apiKey: key }).addTo(map);

// metodo per geolocalizzare il dispositivo
// e settare la visuale della mappa
map.on('locationerror', onLocationError)

//---------------------------- STAMPA SEGNALAZIONI DAL DATABASE ----------------------------
import { onLocationFound, onLocationError } from './segnalazioni.js'
onLocationFound
onLocationError
//---------------------------- STAMPA SEGNALAZIONI DAL DATABASE ----------------------------

//---------------------------- REVERSE GEOCODING ----------------------------
import { onMapClick } from './reverse_geocoding.js';
map.on('click', onMapClick);
//---------------------------- REVERSE GEOCODING ----------------------------