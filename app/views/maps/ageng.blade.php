@extends('layout.main')
@section('head')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
    <script>
  var map;
  var markers = [];
  var dw = [];
  var bahari = [];
  var kuliner = [];
  var alam = [];
  var religi = [];
  var buatan = [];
  var rm = [];
  var hotel = [];
  var pombensin = [];
  
  
  //coba dulu jumlah data yang ditampiliin disesuain sama jumlah data yg disini dulu, lat lon id wajib ada
  
  
  
  function create_markers(lat,lon,nama,kategori,id,gambar){
    var origin = new google.maps.LatLng(-6.89033847,109.3802836);
    var myLatLng = new google.maps.LatLng(lat,lon);   
    if(kategori=='Desa Wisata'){
      var image = "images/icon/desawisata.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      dw.push(marker);
      
    }else if(kategori=='Bahari'){
      var image = "images/icon/bahari.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      bahari.push(marker);
      
    }else if(kategori=='Kuliner'){
      var image = "images/icon/kuliner.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      kuliner.push(marker);
      
    }else if(kategori=='Alam'){
      var image = "images/icon/alam.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      alam.push(marker);
      
    }else if(kategori=='Religi'){
      var image = "images/icon/religi.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      religi.push(marker);
      
    }else if(kategori=='Buatan'){
      var image = "images/icon/buatan.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      buatan.push(marker);
      
    }else if(kategori=='rumahmakan'){
      var image = "images/icon/restaurant.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      rm.push(marker);
      
    }else if(kategori=='hotel'){
      var image = "images/icon/hotel.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      hotel.push(marker);
      
    }else if(kategori=='pombensin'){
      var image = "images/icon/pombensin.png"
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:nama,
        icon:image
      });
      pombensin.push(marker);
    }   
    
    markers.push(marker);

    //membuat marker saat diklik ada keterangannya
    var jarak; 
    jarak = google.maps.geometry.spherical.computeDistanceBetween (origin, myLatLng);
    var jarakkm = parseFloat(jarak / 1000).toFixed(2);
    var infowindow = new google.maps.InfoWindow({
      content: "<h3>"+nama+"</h3>"+
          "<div style='color:#000;'><center><img src='images/"+gambar+".jpg' width='120px' /></center><br />" +
           "Nama Wisata : "+nama+" <br />" +
           "Jarak dari pusat kota: "+jarakkm+" Km <br />" +          
           "<a href="+"http://localhost/voyage/profile.php?id="+id+"&jenis="+kategori+" target='blank'>Info Detail </a><br /></div>",
      maxWidth: 900
    });

    google.maps.event.addListener(marker, 'click', function(event) {
      
      infowindow.open(map,marker);
      
    });

    marker.setMap(map);
  }
  
  function rad(x) {return x*Math.PI/180;} 
  //temukan tanda terdekat 
  function find_closest_marker(lat,lng,marks, limit_dis) {
    var R = 6371; // radius of earth in km
    var distances = [];
    var closest = -1; //jarak terdekat dalam 1 km
    for( i=0;i<markers.length; i++ ) {
      var mlat = marks[i].position.lat(); //meakses latitude
      var mlng = marks[i].position.lng(); //meakses longitude
      var dLat  = rad(mlat - lat); //lat dan lat dikurangi
      var dLong = rad(mlng - lng); //long dan long dikurangi
      var a = Math.sin(dLat/2) * Math.sin(dLat/2) + //rumus haversine dari gmaps
        Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c;  
      distances[i] = d;
      if ( closest == -1 || d < distances[closest] ) {
        closest = i;
      }
    }; //menampilkan jarak dan memberikan keterangan jarak
    if(distances[closest] < limit_dis){
      //membuat marker saat diklik ada keterangannya
    var infowindow = new google.maps.InfoWindow({
      content: "<div style='color:#000;'>Lokasi Terdekat "+markers[closest].title+"</div>"
    });
      infowindow.open(map,markers[closest]);
    }else{
      alert("Jaraknya Lebih Dari 5 KM (Jarak terdekat "+distances[closest]+")");
    }
  }
  
  function find_nearest(){
    var inpLon = document.getElementById('lon').value;
    var inpLat = document.getElementById('lat').value;
    find_closest_marker(inpLat,inpLon,markers, 5);
  }
  
  
  function initialize() {
    var myLatlng = new google.maps.LatLng(-6.94658850,109.4066297); //sesuaiin sama center map mu ya
    var mapOptions = {
    zoom: 10,
    center: myLatlng
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    //isi php nya sesuaiin sama nama table di databasemu
    
  
  
  ?>
  //create_markers(-7.16366848,109.2803396);
      /*if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = new google.maps.LatLng(position.coords.latitude,
                         position.coords.longitude);

        var infowindow = new google.maps.InfoWindow({
          map: map,
          position: pos,
          content: 'Lokasi Saat Ini.'
        });

          map.setCenter(pos);
        }, function() {
          handleNoGeolocation(true);
        });
        } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
        }*/

  
  }
  
  google.maps.event.addDomListener(window, 'load', initialize);
  $(document).ready(function(){
    $('.dw').change(function(){
      //alert('kantor');
      //alert(a)
      if(!$(this).is(':checked')){
        //alert(pertanian.length);
        for(i=0;i<dw.length;i++){
          dw[i].setMap(null);
        }
      }else{
        //alert(pertanian.length);
        for(i=0;i<dw.length;i++){
          dw[i].setMap(map);
        }
      }
      
      return false;
    })
    

    })
    
    
  });
    </script>
@endsection

@section('content')




<center>
<div id="map-canvas" style='width:100%;height:500px;'></div>  
  <div style='font-size:12px;font-weight:bold;'>
    <br />  
      <input type='checkbox' class='dw' checked /><img src="images/icon/desawisata.png"> Desa Wisata
      <input type='checkbox' class='bahari' checked /><img src="images/icon/bahari.png"> Bahari
      <input type='checkbox' class='kuliner' checked /><img src="images/icon/kuliner.png"> Kuliner
      <input type='checkbox' class='alam' checked /><img src="images/icon/alam.png"> Alam
      <input type='checkbox' class='religi' checked /><img src="images/icon/religi.png"> Religi
      <input type='checkbox' class='buatan' checked /><img src="images/icon/buatan.png"> Buatan
      <input type='checkbox' class='rm' checked /><img src="images/icon/restaurant.png"> Restaurant
      <input type='checkbox' class='hotel' checked /><img src="images/icon/hotel.png"> Hotel
      <input type='checkbox' class='pombensin' checked /><img src="images/icon/pombensin.png"> Pom Bensin
  </div>
</center>
@endsection