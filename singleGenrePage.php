
<?php
require_once 'config.inc.php';

function createGenreInfo(){
            
    echo "<label>Genre Name:</label><br>";
    echo "<div id='genreName'></div><br>";
    echo "<div>PHP will generate this image</div><br>";
    echo "<label>Era:</label><br>";
    echo "<span id='genreEra'></span><br>";
    echo "<label>Description:</label><br>";
    echo "<span id='genreDesc'></span><br>";
    echo "<label>Link:</label>";
    echo "<a href ='' id = 'link'> on wikipedia</a><br>";
    echo "</div>";

}

$genreID = $_GET["GenreID"];
echo "<script type = 'text/javascript'> var type = 'genre' </script>"; 
echo "<script type = 'text/javascript'> var genreID = $genreID </script>"; 
echo "<script type = 'text/javascript' src = 'js/genreServices.js'></script>";
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";
?>

<html lang="en">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Genre Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>

<main class = 'singlePage'>
    
    <div id="genreInfo" class = 'box'>
        
        <h2>Genre Info</h2>

<?php  
createGenreInfo();
?>

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
</html>