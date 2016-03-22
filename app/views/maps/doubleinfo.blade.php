@extends('layout.main')
@section('head')
 <style>
      #map-canvas {
        width: 900px;
        height: 700px;
        
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyAePMOi6hqCOnd10Q7Za2cqqosFGejEDso"></script>
<script>
 function initialize() {
  var myLatlng = new google.maps.LatLng(-7.771401, 110.378787);
  var Latbaru = new google.maps.LatLng(-7.760, 110.378787);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var image = 'images/icon.png';
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Universitas Gadjah Mada</h1>'+
      '<div id="bodyContent">'+
      '<p align="justify"><b>Gadjah Mada University</b>,  is a public research university located in Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia. ' +
      'Officially founded on 19 December 1949,[3] three years after its first lecture was given on 13 March 1946,  '+
      'it is the oldest and largest institution of higher education in Indonesia,'+
      'and considered one of the most prestigious.</p>'+
      '<p align="justify">Comprising 18 faculties and 27 research centers, UGM offers 68 undergraduate, 23 diploma, 104 master and specialist, '+
      ' and 43 doctorate study programs, ranging from the Social Sciences to Engineering. The university has enrolled approximately 55,000 students,'+
      ' 1,187 foreign students, and has 2,500 faculty members. UGM maintains a campus of 360 acres (150 ha), with facilities that include a stadium and a fitness center.'+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Source : <a href="http://en.wikipedia.org/wiki/Gadjah_Mada_University">'+
      'Wikipedia</a> '+
      '</p>'+
      '</div>'+
      '</div>';

   var contentString2 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Universitas Gadjah Mada</h1>'+
      '<div id="bodyContent">'+
      '<p align="justify"><b>Gadjah Mada University</b>,  is a public research university located in Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia. ' +
      'Source : <a href="http://en.wikipedia.org/wiki/Gadjah_Mada_University">'+
      'Wikipedia</a> '+
      '</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var infowindow2 = new google.maps.InfoWindow({
      content: contentString2
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      
      title: 'Kampus tercinta'
  });

  var marker1 = new google.maps.Marker({
      position: Latbaru,
      map: map,
      
      title: 'Kampus UGM'
  });



  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  google.maps.event.addListener(marker1, 'click', function() {
    infowindow2.open(map,marker1);
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