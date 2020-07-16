@extends('layouts.app')

@section('content')
<div class="container row">

    <div class="col-lg-5">

    <a><img class="card-img-top" width="50" height="200" src="data:image;base64,{{$loc->imge}}" alt=""></a>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">adresse:{{$loc->adresse}}</li>
        </ol>
      </nav>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">capacity: {{$loc->capacity}}</li>
        </ol>
      </nav>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page" id='latitude'>lat: {{$loc->lat}}</li>
        </ol>
      </nav>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page" id='longtitude'>long: {{$loc->long}}</li>
        </ol>
      </nav>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">superficie: {{$loc->superficie}}</li>
        </ol>
      </nav>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">wifi</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-7">
    
      <div class="form-check">
      <div id="map">
        <!-- Ici s'affichera la carte --> 
      </div>
  </div>
  <input type='hidden' id='long' value='{{$loc->long}}'>
 <input type='hidden' id='lat' value='{{$loc->lat}}'>
  <input type='hidden'value='{{asset("icone1.png")}}' id='ico'>


</div>


<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
            var lat=document.getElementById('lat').value ;
            var long =document.getElementById('long').value;
            var ic=document.getElementById("ico").value;
            var macarte = null;
            console.log(lat+"/ "+long);
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, long], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
            };

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

        L.marker([lat,long],{icon: myIcon}).addTo(macarte);

                    };
        </script>
@endsection
