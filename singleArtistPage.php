<?php
require_once 'config.inc.php';

function createArtistInfo(){
    
        echo " <label>Artist Name:</label><br>";
        echo "<div id = 'artistName'></div><br>";
        echo "<div id = ''>PHP will generate image of artist</div><br>";
        echo "<label>Nationality:</label> <br>";
        echo "<span id = 'nationality'></span><br>";
        echo "<label>Gender:</label><br>";
        echo "<span id = 'artistGender'></span><br>";
        echo "<label>Year of Birth:</label><br>";
        echo "<span id = 'artistYOB'></span><br>";
        echo "<label>Details:</label><br>";
        echo "<span id = 'artistDetails'></span><br>";
        echo "  <label>Link: </label> ";        
        echo "<a href ='' id = 'artistWebsite'></a><br>";
        
        
    echo "</div>";

    
}

$artistID = $_GET["ArtistID"];
echo "<script type = 'text/javascript'> var type = 'artist' </script>"; 
echo "<script type = 'text/javascript'> var artistID = $artistID </script>"; 
echo "<script type = 'text/javascript' src = 'js/artistServices.js'></script>";
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";
?>

<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Artist Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main class = 'singlePage'>
    <div id="artistInfo" class= 'box'>

<!-- artist info -->
<?php  
createArtistInfo();

  ?>


    <div id = 'paintingList' class = 'box'>
        
                <table  style="width:100%" id = 'paintTable'>
                     <tr>
                         <th> </th>
                         <th id = 'headingArtist'>Artist</th>
                         <th id = 'headingTitle'>Title</th>
                         <th id = 'year'>Year</th>
                    </tr>
            
</main>
</body>
<script src=""></script>
</html>