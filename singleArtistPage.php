<?php

require_once 'config.inc.php';

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
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)
$currentArtist = $_GET['ArtistID']; //This is required for the second section with java aswell so do not remove!

$http = curl_init("services/artist.php?ArtistID=$currentArtist");
curl_setopt($http, CURLOPT_HEADER, false); 
curl_setopt($http, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false); 
$jsondata = curl_exec($http);
$status_code = curl_getinfo($http, CURLINFO_HTTP_CODE);
curl_close($http);
$row = json_decode($jsondata);
        echo "<div>$row->ArtistID</div>";
        echo " <label>Artist Name:</label><br>";
        echo "<div id = 'ArtistName'>".$row['FirstName']." ". $row['LastName'] ."</div><br>";
        echo "<div id = ''>PHP will generate image of artist</div><br>";
        echo "<label>Nationality:</label> <br>";
        echo "<span id = 'nationality'>".$row->Nationality."</span><br>";
        echo "<label>Gender:</label><br>";
        echo "<span id = 'artistGender'>".$row['Gender']."</span><br>";
        echo "<label>Year of Birth:</label><br>";
        echo "<span id = 'artistYOB'>".$row['YearOfBirth']."</span><br>";
        echo "<label>Details:</label><br>";
        echo "<span id = 'artistDetails'>".$row['Details']."</span><br>";
                  echo "  <label>Link: </label> ";        
        echo "<a href ='".$row['ArtistLink']."' id = 'artistWebsite'>".$row['ArtistLink']."</a><br>";
        
        
    echo "</div>";

  ?>


    <div id = 'paintingList' class = 'box'>
        <table id = 'paintingTable' style="width:100%">
            <script src="js/paitingTable.js">
            //HERE IS WHERE I AM HAVING ISSUES!
            //var ID = <?php echo $currentArtist; ?>;
            //Then i am obviosuly missing something clear because it won't allow the next commands to commence.
            //console.log(ID);
            //generatePaintingTable();
            </script>
        </table>
            
</main>
</body>
<script src=""></script>
</html>