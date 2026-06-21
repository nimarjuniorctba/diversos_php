<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>Motoboy</title>

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

html,
body,
#map{

height:100%;
margin:0;

}

</style>

</head>

<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const apiKey="337e58f007064ddab3461394b4cbd903";

const map=L.map('map').setView([-25.43,-49.27],17);

L.tileLayer(
'https://maps.geoapify.com/v1/tile/osm-carto/{z}/{x}/{y}.png?apiKey='+apiKey,
{
maxZoom:20,
attribution:'© Geoapify'
}
).addTo(map);

let marker=L.marker([-25.43,-49.27]).addTo(map);

function atualizar(){

fetch("localizar.php")

.then(r=>r.json())

.then(function(d){

let lat=parseFloat(d.latitude);
let lng=parseFloat(d.longitude);

marker.setLatLng([lat,lng]);

map.setView([lat,lng]);

});

}

atualizar();

setInterval(atualizar,2000);

</script>

</body>

</html>