@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('addL') }}" method="POST" enctype="multipart/form-data">
  @CSRF
  <div class="form-group">
    <label for="imge">Image for Location</label>
    <input type="file" class="form-control-file" name="imge">
  </div>
    <div class="form-group">
      <label for="adresse">address</label>
      <input type="text" class="form-control"  name="adresse" aria-describedby="emailHelp" placeholder="Enter adresse">
    </div>
    <div class="form-group">
      <label for="capacity">capacity</label>
      <input type="text" class="form-control" name="capacity" aria-describedby="emailHelp" placeholder="Enter capacity">
    </div>
    <div class="form-group">
      <label for="latitude">latitude</label>
      <input type="text"  onchange="markerlat(this.value)" class="form-control" name="latitude" id="lat" aria-describedby="emailHelp" placeholder="Enter latitude">
    </div>
    <div class="form-group">
      <label for="longtitude">longtitude</label>
      <input type="text" onchange="markerlong(this.value)" class="form-control" name="longtitude" id="long  " aria-describedby="emailHelp" placeholder="Enter longtitude">
    </div>
    <div class="form-group">
      <label for="price">price</label>
      <input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="Enter price">
    </div>
    <div class="form-group">
      <label for="superficie">superficie</label>
      <input type="number" class="form-control" name="superficie" aria-describedby="emailHelp" placeholder="Enter superficie">
    </div>
    <div class="form-check">
    <input type="checkbox" class="form-check-input" name="wifi">
    <label class="form-check-label" for="wifi">wifi</label>
  </div>
  <br>
    <div class="form-check">
    <div id="map">
	    <!-- Ici s'affichera la carte --> 
	  </div>
  </div>
  <br>

 <input type='hidden' id='long' value='{{$loc->long}}'>
  <button type="submit" class="btn btn-success lg">Submit</button>
  </form>
</div>


<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
            var lat ;
            var long ;
            var ic=document.getElementById("ico").value;
            var macarte = null;
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([33.589886, -7.603869], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
            }
            imputlat=document.getElementById('lat');
            imputlong=document.getElementById('long');
            //marker();
            window.onload =  function(){
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap(); 
            var myIcon = L.icon({
            iconUrl: ic,
            iconSize: [38, 95],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76],
            shadowSize: [68, 95],
            shadowAnchor: [22, 94]
        });

        L.marker([lat,  long],{icon: myIcon}).addTo(macarte);

                    };
  // function for geting lat when the user tap 
              function markerlat(val){
              // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
              var myIcon = L.icon({
              iconUrl: ic,
              iconSize: [38, 95],
              iconAnchor: [22, 94],
              popupAnchor: [-3, -76],
              shadowSize: [68, 95],
              shadowAnchor: [22, 94]
          });
          lat=val;
          console.log(lat+' / '+long);
          L.map('map').setView([lat, long], 11);
          L.marker([lat, long],{icon: myIcon}).addTo(macarte);
            };

  // function for geting long when the user tap 

            function markerlong(val){
              // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
              var myIcon = L.icon({
              iconUrl: ic,
              iconSize: [38, 95],
              iconAnchor: [22, 94],
              popupAnchor: [-3, -76],
              shadowSize: [68, 95],
              shadowAnchor: [22, 94]
          });
          long=val;
          console.log(lat+' / '+long);
          L.map('map').setView([lat, long], 11);
          L.marker([lat,long],{icon: myIcon}).addTo(macarte);
            };


            
        </script>
@endsection
