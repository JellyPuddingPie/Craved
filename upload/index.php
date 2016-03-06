<?php
session_start();
include('login/session.php');
include('assets/php/Functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Craved - Upload foodpics</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

	 
  </head>
  <body>
   <form action="upload/upload.php" method="post" enctype="multipart/form-data">
	<label>Select image to upload:</label>
    <input type='file' name="fileToUpload" onchange="readURL(this);" /><br/>
    <img id="preview" src="#" alt="your image" /><br/>
	<label>Select the restaurant:</label><br/>
    <input id="pac-input" class="controls" type="text"
        placeholder="Where did you eat this?">
    
    <div id="map"></div>
	
	
	<input type="hidden" name="restname" id="restname" required="required">
	
	<input type="hidden" name="address" id="address">
	
	<input type="hidden" name="nr" id="nr">
	
	<input type="hidden" name="city" id="city">
	
	<input type="hidden" name="site" id="site">
	<br/>
	
	<input type="text" name="prijs" id="prijs" placeholder="price">
	<br/>
	<input type="checkbox" name="etenstype[]" class="chk" value="1">Vlees
	<br/>
	<input type="checkbox" name="etenstype[]" class="chk" value="2">Vis
	<br/>
	<input type="checkbox" name="etenstype[]" class="chk" value="3">Vegetarisch
	<br/>
	<input type="checkbox" name="etenstype[]" class="chk" value="4">Glutenvrij
	<br/>
	<input type="checkbox" name="etenstype[]" class="chk" value="5">Suikervrij
	<br/>
	
    
    <input type="submit" value="Upload Image" name="upload">
</form>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhqkAKpD--AOj1Avg_2-XM1e0risMDoOw&libraries=places&callback=initMap"
        async defer></script>
		<script src="upload/upload.js">
    
    </script>
  </body>
</html>