"use strict"
 async function initMap(){
    let mapElement = document.getElementById('map');
    let map;
    if (mapElement){
        const Melabio = {lat: 44.1784768, lng: 4.7625435};
        const {Map} = await google.maps.importLibrary("maps");
        const {AdvancedMarkerElement} = await google.maps.importLibrary("marker");
        map = new Map(mapElement,{
            zoom: 8,
            center: Melabio,
            mapId: "Position_melabio",
          });
          // le marqueur
          const marker = new AdvancedMarkerElement({
            map:map,
            position: Melabio,
            title:"Mélabio",
          });
    }
}
