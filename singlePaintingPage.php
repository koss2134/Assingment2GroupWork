<?php

require_once 'config.inc.php';

function createArtistInfo(){
    echo " <div id='paintingDiv' class = 'box'>";
    echo " <img id='painting' src=''/>";
    
    echo " </div>";
    echo " <div id='paitingInfo' class = 'box'>";
    echo " <h2 id = 'singlePaintTitle'></h2>";
    echo " <h3 id ='singlePaintArtist'></h3>";
    echo "<div id='singlePaintInfo'></div><br>";
    echo " <div id = 'singlePaintingDesc'></div><br>";
    echo " <div id = 'colorScheme'>Color Scheme</div><br>";
    echo " <div id = 'amountfaves'>X people have favourited this painting</div><br>";
    echo " <button type = 'button'> Add to you Favourites</button>";
    echo " <button type = 'button'> See My Favourites</button><br>";
    echo " <div id = 'ratings'>Ratings</div><br>";
    echo " <div id = 'reviews'>Reviews</div><br>";
    echo " <span id = 'reviewSpan'>If there was a review for this painting you could view it here</span>";
    echo "</div>";  
    
}

$paintingID = $_GET["PaintingID"];
echo "<script type = 'text/javascript'> var paintingID = $paintingID </script>"; 
echo "<script type = 'text/javascript' src = 'js/paintingServices.js'></script>";


?>

<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Painting Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main class = 'singlePage'>
    
<?php  


createArtistInfo();

 ?>
    
</main>
</body>
<script src=""></script>
</html>