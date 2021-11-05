<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="./assets/logo/logo.png">

  <title>Dashboard Integrasi Data Radiosonde</title>

  <link rel="canonical" href="http://puslitbang.bmkg.go.id/inarason_v2/">

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/product.css" rel="stylesheet">

  <!-- Header InaRASONIS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/geotiffjs/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
  <script src="assets/geotiffjs/L.Control.Locate.min.js" charset="utf-8"></script>
  <script src="assets/geotiffjs/leaflet-geotiff.js"></script>
  <script src="assets/geotiffjs/leaflet-geotiff-plotty.js"></script>
  <script src="assets/geotiffjs/leaflet-geotiff-vector-arrows.js"></script>
  <script src="assets/geotiffjs/geotiff.min.js"></script>
  <!--<script src="assets/geotiffjs/src/geotiff.js"></script>-->
  <script src="assets/geotiffjs/raster-marching-squares.min.js"></script>
</head>

<body>

  <nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="http://puslitbang.bmkg.go.id/inarason_v2/">
        <img src="assets/logo/logo.png" alt="logo" width="24" height="24" />
      </a>
      <a class="py-2 d-none d-md-inline-block" href="./inarason.php">InaRASONIS</a>
      <a class="py-2 d-none d-md-inline-block" href="./skewt.php">Skew-T</a>
      <a class="py-2 d-none d-md-inline-block" href="./rason_correction.php">Rason Correction</a>
      <a class="py-2 d-none d-md-inline-block" href="./csm.php">Cold-Surge Monitoring</a>
      <a class="py-2 d-none d-md-inline-block" href="http://202.90.198.221/sonde-net/" target="_blank" rel="noopener noreferrer">Sonde-Net</a>
    </div>
  </nav>

  <div id="leafletmap">
    <main>
      <div class="container">
        <style>
          #mapid {
            margin: 0 auto;
            position: absolute;
            top: 6%;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: -1;
          }

          /* css to customize Leaflet default styles  */
          .custom .leaflet-popup-tip,
          .custom .leaflet-popup-content-wrapper {
            background: #e93434;
            color: #ffffff;
        </style>

        <div id="mapid"></div>

        <script>
          var image = L.layerGroup();
          //var imageUrl = '../inaraise_rd/gmap/z/transparent-composite-indonesia-cmax-2018-11-24-07-30.png',
          //    imageBounds = [[8.1, 93], [-12, 143]];
          //L.imageOverlay(imageUrl, imageBounds).addTo(image);
          //
          //map//

          var ico = L.icon({
            iconUrl: 'assets/icon1.png',
            iconAnchor: [15, 30],
            iconSize: [30, 30],
          });

          function addMarker(lat, lng, info) {
            var customOptions = {
              'maxWidth': '1000',
              'className': 'custom'
            }
            L.marker([lat, lng], {
              icon: ico
            }).bindPopup(info, customOptions).addTo(image);
          }


          <?php
          require('database.php');
          $query = mysql_query("select * from rason_map");
          while ($data = mysql_fetch_array($query)) {
            $lat = $data['lintang'];
            $lon = $data['bujur'];
            $alt = $data['elevasi'];
            $staid = $data['staid'];
            $stanama = $data['stanama'];
            $image = $staid . ' - ' . $stanama . ' (' . $alt . ' mdpl) <br><img src="skewt/' . $staid . '.png" alt="Skew-T image" width="600px" >';
            echo ("addMarker($lat, $lon, `$image`);\n");
          }
          ?>

          var mymap = L.map('mapid', {
            center: [-3.848666, 117.2772494],
            zoom: 5,
            layers: [image]
          });
          var baseLayers = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            id: 'mapbox.streets'
          }).addTo(mymap);

          var mbAttr1 = '',
            mbUrl1 = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

          var mapbox = L.tileLayer(mbUrl1, {
            id: 'mapbox.light',
            attribution: mbAttr1
          });

          var baseLayers = {
            "Basemap by ESRI Leaflet": baseLayers,
            "OSM": mapbox
          };

          var overlays = {

          };

          L.control.layers(baseLayers, overlays, {
            position: 'topleft',
            collapsed: false
          }).addTo(mymap);

          mymap.createPane('labels');
          // This pane is above markers but below popups
          mymap.getPane('labels').style.zIndex = 400;
          // Layers in this pane are non-interactive and do not obscure mouse/touch events
          mymap.getPane('labels').style.pointerEvents = 'none';
          var road = L.tileLayer('https://{s}.tiles.mapbox.com/v3/weatherdecisiontechnologies.g9a83pc2/{z}/{x}/{y}.png', {}).addTo(mymap);
          var road_labels = L.tileLayer('https://{s}.tiles.mapbox.com/v3/weatherdecisiontechnologies.g9a8dn00/{z}/{x}/{y}.png', {
            pane: 'labels'
          }).addTo(mymap);
          var terrain = L.tileLayer('https://{s}.tiles.mapbox.com/v3/weatherdecisiontechnologies.g7pcpdfj/{z}/{x}/{y}.png', {}).addTo(mymap);
          var terrain_labels = L.tileLayer('https://{s}.tiles.mapbox.com/v3/weatherdecisiontechnologies.g7pd6353/{z}/{x}/{y}.png', {
            pane: 'labels'
          }).addTo(mymap);

          function onLocationFound(e) {
            var radius = e.accuracy / 2;

            L.marker(e.latlng).addTo(mymap)
              .bindPopup("You are location").openPopup();
          }

          function onLocationError(e) {
            mymap.setView({
              lat: -3.848666,
              lng: 117.2772494
            }, 5);
            alert(e.message);
          }

          var popup = L.popup();

          function onMapClick(e) {
            popup
              .setLatLng(e.latlng)
              .setContent("" + e.latlng.toString())
              .openOn(mymap);
          }
        </script>

        <div class="logoSite">
          <p>
            <img src="assets/logo/logo_black.png" alt="logo" style="width:50px;" /><br>
            <b>Indonesia Radiosonde Integration System (InaRASONIS v1.0)</b>
            <b><br>Pusat Penelitian dan Pengembangan</b>
            <!--<br><b>BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</b>-->
            <br>&copy; 2019-2020
          </p>
        </div>
      </div>
    </main>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
</body>

</html>