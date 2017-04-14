<?php


ini_set('display_errors', 1); 
    error_reporting(E_ALL);
    
    
    
    
require 'vendor/autoload.php';
$apiKey = 'test_57670e0f131570e9c26ee2eef9fb53721e1';
$lob = new Lob\Lob($apiKey);
    

if(isset($_POST['StreetAddress'])){
    $street = $_POST['StreetAddress'];
}
else{
    $street ="";
}
if(isset($_POST['City'])){
 $city =    $_POST['City'];
}
else{
    $city ="";
}
if(isset($_POST['PostalCode'])){
    $zip = $_POST['PostalCode'];
}
else{
    $zip = "";
}

if(isset($_POST['State'])){
    $state = $_POST['State'];
}
else{
    $state="";
}



$address = $lob->addresses()->verify(array(
  'address_line1'     => $street,
  'address_city'      => $city,
  'address_state'     => $state,
  'address_zip'       => $zip
));

echo json_encode($address);
//var_dump($address);