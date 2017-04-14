<?php

ini_set('display_errors', 1); 
    error_reporting(E_ALL);

?>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>


<div id="wrapper">
    <div id="map"></div>
</div>
    
    <script>
        
      
        
      
        
        
        
        
        
        
        
        
        
        
      //map
      var map;
   
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.0000, lng: -97.0000},
          zoom: 3
        });
        
        var info = new google.maps.InfoWindow({
                content: "test"
                });

        
//        function loc(address) {
//            geocoder = new google.maps.Geocoder();
//            //var address = document.getElementById(address).value;
//            geocoder.geocode( { 'address': address}, function(results, status) {
//              if (status === google.maps.GeocoderStatus.OK) {
//                    return "Lat: "+results[0].geometry.location.lat()+ 
//                     ", Lng: "+results[0].geometry.location.lng();
//              }
//            });
//          }
//          
//          function lat(address) {
//            geocoder.geocode( { 'address': address}, function(results, status) {
//              if (status === google.maps.GeocoderStatus.OK) {
//                    return results[0].geometry.location.lat();
//              }
//            });
//          }
//          function lng(address) {
//            geocoder.geocode( { 'address': address}, function(results, status) {
//              if (status === google.maps.GeocoderStatus.OK) {
//                    return results[0].geometry.location.lng();
//              }
//            });
//          }
          
          

        //infowindow
        function make_info(city,loc,ad1,imgsrc) {
            
//            var imgs = "";
//            for(var i =0; i < imgsrc.length;i++){
//                
//                imgs += "<img src="+imgsrc[i]+ ">";
//            }
            
            
            info.setContent(
                  '<div class="info">'+
                      '<h3>' + city + '</h3>'+//Title
                      '<div class="imgContainer"><img src="'+imgsrc+'"></div>'+//Images
                       '<p>'+ad1+'</p>'+//Extra text 
                  '</div>'
                );
        setTimeout(function(){
            info.open(map, loc); 
        }, 20);
              
        }
        
        <?php include 'createMarkers.php';?>

        //locations
        
//        //AZ//
//        var tempe = new google.maps.Marker({
//            position: {lat: 33.4223436, lng: -111.9272967},
//            map: map
//        });
//        tempe.addListener('click', function() {
//            make_info("blick_tempe","Tempe",this,"AZ","930 E. University Drive");
//        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBNRYlUbXOWvZxkZzeeXsgUldiF5fj-ig&callback=initMap"
    async defer></script>

