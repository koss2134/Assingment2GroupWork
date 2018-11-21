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
 
include('services/artist.php');
$row = getArtist();


        
         echo " <label>Artist Name:</label><br>";
        echo "<div id = 'ArtistName'>".$row['FirstName']." ". $row['LastName'] ."</div><br>";
        echo "<div id = ''>PHP will generate image of artist</div><br>";
        echo "<label>Nationality:</label> <br>";
        echo "<span id = 'nationality'>".$row['Nationality']."</span><br>";
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
                <table  style="width:100%">
                    
                     <tr>
                         <th> </th>
                         <th id = 'headingTitle'>Title</th>
                         <th id = 'headingArtist'>Artist</th>
                         <th id = 'year'>Year</th>
                    </tr>
                    <tr>
                        <td>img</td>
                        <td>title</td>
                        <td>artist</td>                   
                        <td>year</td>
                   </tr><hr>

<!-- artist info -->
                    
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
    try {
     $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     $sql = "SELECT * FROM Artists,Paintings WHERE Artists.ArtistID =".$_GET['ArtistID']." AND Artists.ArtistID = Paintings.ArtistID";
     $result = $pdo->query($sql);


     while ($row = $result->fetch()) {
            echo " <tr>";
            echo "<td><a href=singlePaintingPage.php?PaintingID=".$row['PaintingID']."><img width=100 height=100 src='images/paintings/square/". $row['ImageFileName'].".jpg'></a></td>";
            echo "<td><a href=singlePaintingPage.php?PaintingID=".$row['PaintingID'].">".$row['Title']."</a></td>";
            echo "<td>".$row['FirstName']." ".$row['LastName']."</td>";                   
            echo "<td>".$row['YearOfWork']."</td>";
            echo "</tr>";
                        
     }
     
    }
    catch (PDOException $e) {
     die( $e->getMessage() );
    }
?>
     </table>
            
</main>
</body>
<script src=""></script>
</html>