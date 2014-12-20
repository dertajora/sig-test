@extends('layout.main')
@section('head')
 <style>
      #map-canvas {
        width: 900px;
        height: 400px;
        
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyAePMOi6hqCOnd10Q7Za2cqqosFGejEDso"></script>
<script>
  function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(-7.771401, 110.378787)
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);

  var image = 'images/icon.png';
  var myLatLng = new google.maps.LatLng(-7.771401, 110.378787);
  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection

@section('content')




<center>
<div id="map-canvas"></div>
</center>
@endsection