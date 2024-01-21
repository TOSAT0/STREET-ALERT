var map = L.map('map').fitWorld()

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map)

map.locate({setView: true, maxZoom: 16})
map.on('click', onMapClick);

function onMapClick(e) {
    var latitude = e.latlng.lat
    var longitude = e.latlng.lng

    $.ajax({
        type: 'POST',
        url: '/process_coordinates',
        data: { latitude: latitude, longitude: longitude },
        success: function(response) {
            L.popup()
                .setLatLng(e.latlng)
                .setContent(response.result)
                .openOn(map);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}