//---------------------------- RICERCA COMUNI ----------------------------
import { map } from "./index.js";

document.getElementById("form").addEventListener("submit", cercaComune)
export function cercaComune(e)
{
    e.preventDefault()
    let comune = document.getElementById("comune").value
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function()
    {
    if (this.readyState == 4 && this.status == 200)
    {
        if(JSON.parse(this.response).lat && JSON.parse(this.response).lon)
        {
            let coords = JSON.parse(this.response)
            map.setView([coords.lat, coords.lon], 13)
        }
    }
}

xhttp.open("GET", "server.php?send=cercaComune&comune=" + comune, true)
xhttp.send()
}
//---------------------------- RICERCA COMUNI ----------------------------