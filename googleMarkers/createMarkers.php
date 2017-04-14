<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors', 1); 
    error_reporting(E_ALL);

include 'dbConnect.php';


//   var tempe = new google.maps.Marker({
//            position: {lat: 33.4223436, lng: -111.9272967},
//            map: map
//        });
//        tempe.addListener('click', function() {
//            make_info("blick_tempe","Tempe",this,"AZ","930 E. University Drive");
//        });



$sql = 'select * from markers group by hecho';
$markers  = $conn->prepare($sql);
$markers->execute();

while($row = $markers->fetch(PDO::FETCH_OBJ)){
    
    $fromcity = $row->hecho;
    $coords = getCoords($fromcity);
    $lat = $coords[0];
    $long = $coords[1];
    $imgsrc = $row->imgsrc;
    
//    $imgsrc = array();
//    $isql = 'select * from markers where hecho = :city  limit 5';
//    $images  = $conn->prepare($isql);
//    $images->bindValue(':city', $fromcity);
//    $images->execute();
//    $count = 0;
//    while($row2 = $images->fetch(PDO::FETCH_OBJ)){
//        $imgsrc[$count] = $row2->imgsrc;
//        $count++;
//    } 
//    $imgsrc = json_encode($imgsrc);
    
    
    $text = "This is placement copy just cuz";
    $js = (' var '.$fromcity.' = new google.maps.Marker({
                position: {lat: '.$lat.', lng: '.$long.'},
                map: map   
             });
             
             '.$fromcity.'.addListener("click", function() {
                make_info("'.$fromcity.'",this,"'.$text.'","'.$imgsrc.'");
             });




          ');
    echo $js;
}



















function getCoords($address){

        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";

        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);
        // response status will be 'OK', if able to geocode given address 
        if($resp['status']=='OK'){

            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                
                $data_arr = array();
                array_push(
                    $data_arr, 
                        $lati, 
                        $longi 
//                        $formatted_address
                    );
                

            }
          return $data_arr;
        }
    }
