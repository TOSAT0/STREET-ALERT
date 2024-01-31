export async function placeMarkers(map)
{
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function()
    {
        // se la richiesta è andata a buon fine scarico i dati ricevuti
        // nel formato JSON in una variabile jsData, chiamando la funzione setData()
        if (this.readyState == 4 && this.status == 200) {
            setData(JSON.parse(this.response))
            showMarkers()
        }
    }
    
    xhttp.open("GET", "server.php?send=getAlerts", true)
    xhttp.send()
    
    //--------------------- RICHIESTA ASINCRONA AL SERVER ---------------------
    
    let jsData;
    
    function setData(a)
    {
        jsData = a
    }
    
    function showMarkers()
    {
        let marker, index = 0, lat, lng, state
    
        while(index < jsData.length)
        {
    
            lat = jsData[index].lat,
            lng = jsData[index].lon,
            state = jsData[index].state
    
            // lo stato della segnalazione serve per impostare 
            // i diversi marker all'interno della mappa
            if(state == 'NEW')
                new maptilersdk.Marker({ color: "#FF0000" }).setLngLat([lng, lat]).addTo(map)
            if(state == 'SEEN')
                new maptilersdk.Marker({ color: "#FEFE17" }).setLngLat([lng, lat]).addTo(map)
            if(state == 'SOLVED')
                new maptilersdk.Marker({ color: "#1FFE17" }).setLngLat([lng, lat]).addTo(map)
            
            index++;
            
        }
    }
}