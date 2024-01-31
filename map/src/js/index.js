import { placeMarkers } from "./segnalazioni.js";
import { createMap } from "./map.js";

export const map = createMap()

placeMarkers(map)

