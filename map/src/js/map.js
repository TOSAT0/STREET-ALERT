import config from "./config.js"

maptilersdk.config.apiKey = config.API_KEY

export function createMap()
{
    const map = new maptilersdk.Map({
        container: 'map',
        style: maptilersdk.MapStyle.STREETS,
        center: [12.550343, 45.665957],
        zoom: 9,
        language: maptilersdk.Language.ITALIAN,
        terrain: false,
        terrainControl: true,
        maxZoom: 19
    })

    const gc = new maptilersdkMaptilerGeocoder.GeocodingControl();
    map.addControl(gc, 'top-left');

    document.querySelector('.mapstyles-select').addEventListener('change', (e) => {
        const style_code = e.target.value.split(".");
        style_code.length === 2 ?
        map.setStyle(maptilersdk.MapStyle[style_code[0]][style_code[1]]) :
        map.setStyle(maptilersdk.MapStyle[style_code[0]] || style_code[0]);
    });

    return map
}