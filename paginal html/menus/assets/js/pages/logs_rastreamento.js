$(function(){
 const el=document.getElementById('trackingMap');if(!el||!window.L)return;
 let points=[];try{points=JSON.parse(document.getElementById('trackingPoints').textContent||'[]');}catch(e){}
 const map=L.map(el).setView([-25.43,-49.27],12);L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'© OpenStreetMap'}).addTo(map);
 if(!points.length)return;
 const coords=points.map(p=>[p.lat,p.lng]);const line=L.polyline(coords,{color:'#ef2437',weight:5,opacity:.85}).addTo(map);
 L.marker(coords[0]).addTo(map).bindPopup('Início: '+points[0].data);L.marker(coords[coords.length-1]).addTo(map).bindPopup('Fim: '+points[points.length-1].data);
 map.fitBounds(line.getBounds(),{padding:[25,25]});setTimeout(()=>map.invalidateSize(),250);
});
