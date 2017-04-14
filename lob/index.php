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
    
    

  </head>
  
  
  <body>

      
      
      
      

      
      <div class="container">
          <h2>Lob, php json response</h2>
          <form method="POST" id="addressForm" action="lob_do.php">
          <table id="address">
      <tr>
        <td class="label">Street address</td>
        <!--<td class="slimField"> <input id="street_number" placeholder="Enter City Here" onFocus="geolocate1()" type="text"></input></td>-->
        <td class="slimField"> <input id="street_number" placeholder="Enter City Here"  type="text"></input></td>

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

    </table>
              
              <input type="submit" value="submit" id="submit"/>
          </form>

       
       
      
      </div>

<div class="container">
      <p id="status">Status: <span></span></p>
      <p id="str">Street: <span></span></p>
      <p id="c">City: <span></span></p>
      <p id="sta">State: <span></span></p>
      <p id="z">Zip: <span></span></p>
      <p id="co">Country: <span></span></p>
      <p id="completeresults">Complete results: <span></span></p>
</div>
      
     


    
    <!-- This is for lob  -->
      <script type="text/javascript">
$(document).ready(function() {
    
    
    
    $("#submit").click(function(event){
    event.preventDefault();
            var StreetAddress = $("#street_number").val();
            var City = $("#locality").val();
            var State = $("#administrative_area_level_1").val();
            var PostalCode = $("#postal_code").val();


            // send API request
            $.ajax({
                url: 'lob_do.php',
                type: 'POST',
                data: { StreetAddress: StreetAddress,
                        City: City,
                        PostalCode: PostalCode,
                        State: State
                    },
                dataType: 'json',
                success: function(json){
                    // check API result
                         $("#completeresults span").text(JSON.stringify(json, null, 4));
                         
                        $("#status span").text(json.message);
                        $("#str span").text(json.address.address_line1);
                        $("#c span").text(json.address.address_city);
                        $("#sta span").text(json.address.address_state);
                        $("#z span").text(json.address.address_zip);
                        $("#co span").text(json.address.address_country);
                }
            });
    
    
     });
     
});
</script>
    
    
    
    
    

  </body>
</html>
