import { mtLayer } from "./index.js";


export function onButtonClick(e)
{
    
    let style = L.MaptilerStyle.STREETS;
    // Retrieve basemap style based on button id
    switch (e.target.id) {
        case "streets":
        style = L.MaptilerStyle.STREETS;
        break;
        case "satellite":
        style = L.MaptilerStyle.SATELLITE;
        break;
        case "dark":
        style = L.MaptilerStyle.DATAVIZ.DARK;
        break;
        case "light":
        style = L.MaptilerStyle.DATAVIZ.LIGHT;
        break;
    }
    mtLayer.setStyle(style);
    
}