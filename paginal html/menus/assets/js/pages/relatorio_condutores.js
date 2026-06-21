$(function(){
 const mapElement=document.getElementById('reportTrackingMap');let points=[];try{points=JSON.parse(document.getElementById('reportTrackingPoints').textContent||'[]');}catch(e){}
 if(mapElement&&window.L){const map=L.map(mapElement).setView([-25.43,-49.27],12);L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'© OpenStreetMap'}).addTo(map);if(points.length){const coords=points.map(p=>[p.lat,p.lng]);const line=L.polyline(coords,{color:'#ef2437',weight:5,opacity:.88}).addTo(map);L.marker(coords[0]).addTo(map).bindPopup('Início: '+points[0].data);L.marker(coords[coords.length-1]).addTo(map).bindPopup('Fim: '+points[points.length-1].data);map.fitBounds(line.getBounds(),{padding:[30,30]});}setTimeout(()=>map.invalidateSize(),250);}
 const $popup=$('#reportExportPopup');$('#openReportPopup').on('click',function(){$popup.addClass('is-visible').attr('aria-hidden','false');$('body').addClass('popup-open');});
 function close(){$popup.removeClass('is-visible').attr('aria-hidden','true');$('body').removeClass('popup-open');}
 $('.close-report-popup').on('click',close);$popup.on('click',function(e){if(e.target===this)close();});
});
