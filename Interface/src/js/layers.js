import {redIcon, greenIcon, blueIcon} from './markers.js';

var city1 = L.marker([45.666182812368675, 12.245502938686116], {icon: redIcon}).bindPopup('This is Piazza dei Signori, TV.'),
    city2    = L.marker([45.663183646553364, 12.2423701184216], {icon: redIcon}).bindPopup('This is Poste Italiane, TV.'),
    city3 = L.marker([45.662253872524964, 12.246275414915724], {icon: blueIcon}).bindPopup('This is Hotel Continental, TV.');

var cities = L.layerGroup([city1, city2]),
    hotel = L.layerGroup([city3]);

var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}),

    osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'
}),

    openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
});
    
var baseMaps = {
    "OpenStreetMap": osm,
    "<span style='color: red'>OpenStreetMap.HOT</span>": osmHOT
},

    overlayMaps = {
    "Cities": cities
};

var layerControl = L.control.layers(baseMaps, overlayMaps);

    layerControl.addBaseLayer(openTopoMap, "OpenTopoMap");
    layerControl.addOverlay(hotel, "Hotel");

export {layerControl};