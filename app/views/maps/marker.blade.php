@extends('layout.main')
@section('head')
 <style>
      #map-canvass {
        width: 900px;
        height: 400px;
        
      }
      #map-canvas2 {
        width: 900px;
        height: 400px;
        
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyAePMOi6hqCOnd10Q7Za2cqqosFGejEDso"></script>
<script>
 function initialize() {
  var myLatlng = new google.maps.LatLng(-7.771401, 110.378787);
  var Lat1 = new google.maps.LatLng(-7.774, 110.378787);
   var Lat2 = new google.maps.LatLng(-7.772, 110.37877);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvass'), mapOptions);

  var map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
     
      title: 'Kampus Tercinta'
  });

  var marker1 = new google.maps.Marker({
      position: Lat2,
      map: map,
    
      title: 'Kampus MIPA'
  });

  var marker2 = new google.maps.Marker({
      position: Lat1,
      map: map2,
    
      title: 'Kampus MIPA'
  });

  
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection

@section('content')




<center>
<div id="map-canvass"></div>
<Br>
<div id="map-canvas2"></div>
</center>
@endsection