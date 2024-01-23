export var map = L.map('map').fitWorld()




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

export const mtLayer = L.maptilerLayer({apiKey: key}).addTo(map);
import { onButtonClick } from './maplayer.js';
document.getElementById('buttons').addEventListener('click',onButtonClick);