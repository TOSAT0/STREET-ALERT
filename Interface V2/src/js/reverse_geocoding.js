import { map } from "./index.js";

let marker = new maptilersdk.Marker({
    color: "#000000"
})

export function onMapClick(e)
{
    marker.setLngLat(e.lngLat).addTo(map)
    
}