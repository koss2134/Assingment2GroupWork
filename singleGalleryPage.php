<?php
require_once 'config.inc.php';

function createGalleryInfo(){
        echo "<h2></h2>";
        echo "<div id = 'info'>";
        echo "<label>Gallery Name:</label><br>";
        echo "<span id = 'galleryName'></span><br>";
        echo "<label>Native Name: </label><br>";
        echo "<span id = 'nativeName'></span><br>";
        echo "<label>City: </label><br>";
        echo "<span id = 'cityName'></span><br>";
        echo "<label>Address: </label><br>";
        echo "<span id = 'address'></span><br>";
        echo "<label>Country: </label><br>";
        echo "<span id = 'country'></span><br>";
        echo "<label>Link: </label> ";
        echo "<span><a href ='' id = 'website'></a></span><br>";
        echo "</div>";
}

 
$galleryID = $_GET["GalleryID"];
echo "<script type = 'text/javascript'> var type = 'gallery' </script>"; 
echo "<script type = 'text/javascript'> var galleryID = $galleryID </script>"; 
echo "<script type = 'text/javascript' src = 'js/galleryServices.js'></script>";
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";

?>

<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Gallery Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>


<main class = 'singlePage'>
    
     <div id = 'galInfo' class = 'box'>
         
<?php  
createGalleryInfo();
?>
    </div>


<script>
//map init section
var map;
//var str = "lati:"+lati+"long:"+longi;
console.log("helloWorld"); 

function initMap() {
//map = new google.maps.Map(document.getElementById("map"), {
  map = new google.maps.Map(document.getElementById("map"), {
 center: {lat:1, lng: 2},
 
//mapTypeId: 'satellite',
 zoom: 4
 });
 map.setTilt(45);
}
        
    map.setCenter(new google.maps.LatLng(55, -30));
        
</script>                
    <div id = 'map' class = 'box'>
        
        MAP__ this is where the map will be generated using JS
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI2c5LYu9mZc58uEl7-B7hjcsUYAFzXAA&callback=initMap" type="text/javascript"></script>

    </div>
    
    <div id = 'paintingList' class = 'box'>
        
                <table  style="width:100%" id = 'paintTable'>
                     <tr>
                         <th> </th>
                         <th id = 'headingArtist'>Artist</th>
                         <th id = 'headingTitle'>Title</th>
                         <th id = 'year'>Year</th>
                    </tr>
                    
          
                    
        </table>
                    
    </div>
</main>
</body>

<script></script>
</html>