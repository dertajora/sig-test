  <?php ?>
  <html>
  <head>
    <script src="https://maps.googleapis.com/maps/api/js?AIzaSyAePMOi6hqCOnd10Q7Za2cqqosFGejEDso"></script>
   <script type="text/javascript">
 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
  map.addControl(new GMapTypeControl());
        var center = new GLatLng(-7.79722, 110.36880);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
        document.getElementById("lng").innerHTML = center.lng().toFixed(5);

   GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
       map.panTo(point);
       document.getElementById("lat").innerHTML = point.lat().toFixed(5);
       document.getElementById("lng").innerHTML = point.lng().toFixed(5);
        });


  GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng").innerHTML = center.lng().toFixed(5);

  GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
      map.panTo(point);
      document.getElementById("lat").innerHTML = point.lat().toFixed(5);
      document.getElementById("lng").innerHTML = point.lng().toFixed(5);
        });
 
        });

      }
    }

    function showAddress(address) {
    var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
   map.clearOverlays()
   map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
   map.addOverlay(marker);

  GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
      map.panTo(pt);
      document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
      document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });


  GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng").innerHTML = center.lng().toFixed(5);

  GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
     map.panTo(pt);
    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
    document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });
 
        });
            }
          }
        );
      }
    }
    </script>

  </head>
<body onload="load()" onunload="GUnload()" >


 
 <table  bgcolor="#FFFFCC" width="300">
  <tr>
    <td>Latitude</td>
    <td>Longitude</td>
  </tr>
  <tr>
    <td id="lat"></td>
    <td id="lng"></td>
  </tr>
  
</table>
 
  <div align="center" id="map" style="width: 600px; height: 400px">

  
</body>
</html>