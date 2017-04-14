<?php 

?>

<!DOCTYPE html>

<html>

      <head>
    <title>Panzoom for jQuery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--<script src="js/functions.js"></script>-->
    
    
    
<!--    <script src="//d79i1fxsrar4t.cloudfront.net/jquery.liveaddress/3.1/jquery.liveaddress.min.js"></script>
    <script>jQuery.LiveAddress({
                key: "32869507428812816", 
//                debug : true,
                autocomplete : 5,
                autoVerify :true,
                missingSecondaryMessage: "Did you forget your apt number?",
//                verifySecondary: true,
                addresses: [{
        
		address1: '#street_number',
		locality: '#locality',
		administrative_area: '#administrative_area_level_1',
		postal_code: '#postal_code',
                }]
            });
           // Support phone number 877.216.8883 
   </script>-->
  </head>
  
  
  <body>

      
      
      
      
<!--             <div class="cityInput">
                  <input id="city1" placeholder="Enter City Here" onFocus="geolocate1()" type="text"></input>
              </div>-->
      
      <div class="container">
           <h2>address-validator, php json response</h2>
          <form method="POST" id="addressForm">
          <table id="address">
      <tr>
        <td class="label">Street address</td>
        <!--<td class="slimField"> <input id="street_number" placeholder="Enter City Here" onFocus="geolocate1()" type="text"></input></td>-->
        <td class="slimField"> <input id="street_number" placeholder="Enter City Here"  type="text"></input></td>
<!--        <td class="wideField" colspan="2"><input class="field" id="route"
              disabled="true"></input></td>-->
      </tr>
      <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="3"><input class="field" id="locality"
              ></input></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input class="field"
              id="administrative_area_level_1" ></input></td>
        
      </tr>
      <tr>
          <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code"
              ></input></td>
      </tr>
<!--      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field"
              id="country" disabled="true"></input></td>
      </tr>-->
    </table>
              
              <input type="submit" value="submit" id="submit"/>
          </form>

       
       
      
      </div>

<div class="container">
      <p id="status">Status: <span></span></p>
      <p id="formattedAddress">Formated address: <span></span></p>
      <p id="str">Street: <span></span></p>
      <p id="c">City: <span></span></p>
      <p id="sta">State: <span></span></p>
      <p id="z">Zip: <span></span></p>
      <p id="co">Country: <span></span></p>
      <p id="completeresults">Complete results: <span></span></p>
</div>
      
     
      
      

      
      
<!--      <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete, autocomplete2;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
//        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('street_number')),
                {types: ['geocode']});
            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress1);

            
            
            
              
          
      }
      
       function fillInAddress1() {
           
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        
          
//          alert(JSON.stringify(place, null, 4));
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        var street = "";
        for (var i = 0; i < place.address_components.length; i++) {
            
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            if(addressType === "street_number" || addressType === 'route'){
                street+= val+" ";
                $("#street_number").val(street);
            }else{
                document.getElementById(addressType).value = val;
            }
          }
        }
        
        
       
 
      }



      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate1() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      

 
 

 
 
 
 
 
 
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-uSidN5dWLMcGb2McojovTKUwNrPWJEI&libraries=places&callback=initAutocomplete"
        async defer></script>
        
        
    -->    
  <script type="text/javascript">
$(document).ready(function() {
    
    
    
    $("#submit").click(function(event){
    event.preventDefault();
            var StreetAddress = $("#street_number").val();
            var City = $("#locality").val();
            var State = $("#administrative_area_level_1").val();
            var PostalCode = $("#postal_code").val();
            var CountryCode = 'US';
        //    var CountryCode = $("#country").val();


            // send API request
            var Locale = 'en';
            $.ajax({
                url: 'https://api.address-validator.net/api/verify',
                type: 'POST',
                data: { StreetAddress: StreetAddress,
                        City: City,
                        PostalCode: PostalCode,
                        State: State,
                        CountryCode: CountryCode,
                        Locale: Locale,
                        APIKey: 'iv-039118ec4e0359818d04187c577b8334'},
                dataType: 'json',
                success: function(json){
                    // check API result
//                    if (typeof(json.status) !== "undefined"){
//                         alert(JSON.stringify(json, null, 4));
                        $("#formattedAddress span").text(json.formattedaddress);
                        $("#status span").text(json.status);
                        $("#str span").text(json.streetnumber+" "+json.street);
                        $("#c span").text(json.city);
                        $("#sta span").text(json.state);
                        $("#z span").text(json.postalcode);
                        $("#co span").text(json.country);
                        $("#completeresults span").text(JSON.stringify(json, null, 4));
//                    }
                }
            });
    
    
     });
     
});
</script>

  </body>
</html>
