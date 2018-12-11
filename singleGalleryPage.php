<?php
require_once 'config.inc.php';

function createGalleryInfo(){
        echo "<div id = 'info'>";                                       //creates the div for the gallery information
        echo "<span id = 'galleryName'></span><br><br>";                //creates the span for the gallery name
        echo "<label>Native Name: </label><br>";                        //creates the label for the native name  
        echo "<span id = 'nativeName'></span><br><br>";                 //creates the span for the native name 
        echo "<label>City: </label><br>";                               //creates the label for the city 
        echo "<span id = 'cityName'></span><br><br>";                   //createss the span for the city
        echo "<label>Address: </label><br>";                            //creates the label for the address
        echo "<span id = 'address'></span><br><br>";                    //creates the span for the address
        echo "<label>Country: </label><br>";                            //creates the label for the country 
        echo "<span id = 'country'></span><br><br>";                    //creates the span for the country 
        echo "<label>Link: </label> ";                                  //creates the label for the link 
        echo "<span><a href ='' id = 'website'></a></span><br>";        //creates the a tag for the website
        echo "</div>";                                                  //closes the div 
}

 
$galleryID = $_GET["GalleryID"];                                                //gets the GalleryID
echo "<script type = 'text/javascript'> var type = 'gallery' </script>";        //passes the variable to JS page to know it is the gallery page
echo "<script type = 'text/javascript'> var galleryID = $galleryID </script>";  //adds the galleryID to the JS functinoality page
echo "<script type = 'text/javascript' src = 'js/galleryServices.js'></script>";//links to the js page that adds functionality
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";   //links to the js page that fills the painting list

?>

<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <link rel="stylesheet" href="css/default.css">
    
    <title>Single Gallery Page</title>
</head>
    <body>
        <?php
        include 'php/header.php';                   //includes header to the page
        ?>


    <main class = 'singlePage'>
    
         <div id = 'galInfo' class = 'box'>
             
            <?php  
            createGalleryInfo();                          //adds all the genre information sections
            ?>
          </div>


    <div id = 'map' class = 'box'>
        
         <script>
            var map;
            
            function initMap() {
                 map = new google.maps.Map(document.getElementById("map"), {
                 center: {lat:1, lng: 2},
                 mapTypeId: 'satellite',
                 zoom: 18
             });
             
                 map.setTilt(45);
            }
                const mapDiv = document.getElementById('map');
                mapDiv.style.height = '400px';
             
        </script>  

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI2c5LYu9mZc58uEl7-B7hjcsUYAFzXAA&callback=initMap" type="text/javascript"></script>

        </div>
    
        <div id = 'paintingList' class = 'box'>
            <h2>Paintings at this Gallery</h2>
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

</html>