import { map } from "./index.js";

export function onMapClick(e)
{
    var lat = e.latlng.lat
    var lng = e.latlng.lng

    // OpenStreetMap Nominatim API endpoint
    var apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

    // Make the API request using the fetch function
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
        if (data.address) {
            var formattedAddress = `${data.address.road}, ${data.address.city}, ${data.address.country}, ${data.address.postcode}`;
            L.popup()
                .setLatLng(e.latlng)
                .setContent(formattedAddress)
                .openOn(map);
        } else {
            console.error('No address found');
        }
    })
    .catch(error => {
    console.error('Error:', error);
    });
}