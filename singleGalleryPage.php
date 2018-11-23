<?php

require_once 'config.inc.php';

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
//include("services/gallery.php");
//$row = getGallery();

         
                echo "<h2>".$row['GalleryName']."</h2>";
                
               echo " <div id = 'info'>";
                    echo "<label>Gallery Name:</label><br>";
                   echo " <span id = 'galleryName'>".$row['GalleryName']."</span><br>";
                   echo " <label>Native Name: </label><br>";
                   echo "<span id = 'nativeName'>".$row['GalleryNativeName']."</span><br>";
                  echo "  <label>City: </label><br>";
                   echo " <span id = 'cityName'>".$row['GalleryCity']."</span><br>";
                   echo " <label>Address: </label><br>";
                   echo " <span id = 'address'>".$row['GalleryAddress']."</span><br>";
                  echo "  <label>Country: </label><br>";
                  echo "  <span id = 'country'>".$row['GalleryCountry']."</span><br>";
                  echo "  <label>Link: </label> ";
                  echo "  <span><a href ='".$row['GalleryWebSite']."' id = 'website'>".$row['GalleryWebSite']."</a></span><br>";
                
    echo "</div>";

  ?>
                
                
    </div>
    
    <div id = 'map' class = 'box'>
        MAP__ this is where the map will be generated using JS
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI2c5LYu9mZc58uEl7-B7hjcsUYAFzXAA&callback=initMap" type="text/javascript"></script>


<?php 
echo "<script> var lati=".$row['Latitude']."; var long=".$row['Longitude'].";


</script>";
?>


<script>
//lati = 30;
//long = 30;
//I ADDED A FILE IN js THAT HAS THE MAP FUNCTIONS I USED FROM MY ASSINGMENT 1 IF YOU WANT TO USE THOSE MIKE - James
var map;
function initMap() {
map = new google.maps.Map(document.getElementById("map"), {
// map = new google.maps.Map(document.querySelector(".d"), {



center: {lat: lati, lng: long},
 // center: {lat: 41.89474, lng: 12.4839},
 
 
//mapTypeId: 'satellite',
 zoom: 5
 });
 map.setTilt(45);
}


map.setCenter(new google.maps.LatLng(lati, long));



</script>

        
        
        
    </div>
    
    <div id = 'paintingList' class = 'box'>
        
                <table  style="width:100%">
                     <tr>
                         <th> </th>
                         <th id = 'headingArtist'>Artist</th>
                         <th id = 'headingTitle'>Title</th>
                         <th id = 'year'>Year</th>
                    </tr>
                    <tr>
                        <td>img</td>
                        <td>title</td>
                        <td>artist</td>
                        <td>year</td>
                    </tr><hr>
                    
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM Artists,Galleries,Paintings 
                 WHERE Galleries.GalleryID =".$_GET['GalleryID']."
                 AND Galleries.GalleryID = Paintings.GalleryID
                 AND Paintings.ArtistID = Artists.ArtistID
                 ";
        $result = $pdo->query($sql);
        
        while ($row = $result->fetch()) {
            echo " <tr>";
            echo "<td><a href=singlePaintingPage.php?PaintingID=".$row['PaintingID']."><img width=100 height=100 src='images/paintings/square/". $row['ImageFileName'].".jpg'></a></td>";
            echo "<td><a href=singlePaintingPage.php?PaintingID=".$row['PaintingID'].">".$row['Title']."</a></td>";
            echo "<td><A href='singleArtistPage.php?ArtistID=". $row['ArtistID'] ."'>". $row['FirstName'] . $row['LastName'] . "</a></td>";
            echo "<td>".$row['YearOfWork']."</td>";
            echo "</tr>";
                            
     }
     
}
    catch (PDOException $e) {
        die( $e->getMessage() );
    }
?>                    
                    
        </table>
                    
    </div>
</main>
</body>
<script src=""></script>
</html>