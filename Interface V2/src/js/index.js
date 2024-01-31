import { placeMarkers } from "./segnalazioni.js";
import { createMap } from "./map.js";
import { onMapClick } from "./reverse_geocoding.js";

export const map = createMap()

placeMarkers(map)

map.on('click', onMapClick);
onMapClick
