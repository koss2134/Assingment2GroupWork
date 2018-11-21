<?php

require_once 'config.inc.php';

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
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = " SELECT ImageFileName,Title,FirstName,LastName,GalleryName,YearOfWork,GenreName,Paintings.Description
             FROM Paintings,Artists,Galleries,Genres,PaintingGenres 
             WHERE Paintings.PaintingID =".$_GET['PaintingID']." 
             AND Paintings.ArtistID= Artists.ArtistID
             AND Paintings.GalleryID = Galleries.GalleryID
             AND Paintings.PaintingID = PaintingGenres.PaintingID
             AND PaintingGenres.GenreID = Genres.GenreID";

 
    $result = $pdo->query($sql);

    $row = $result->fetch();

    echo " <div id='paintingDiv' class = 'box'>";
    echo " <img src='images/paintings/full/". $row['ImageFileName'] .".jpg'/>";
    echo " </div>";
    echo " <div id='paitingInfo' class = 'box'>";
    echo " <h2 id = 'singlePaintTitle'>". $row['Title'] ."</h2>";
    echo " <h3 id ='singlePaintArtist'>". $row['FirstName'] ." ".  $row['LastName'] ."</h3>";
    echo "<div id='singlePaintInfo'>". $row['GalleryName'] ." ". $row['YearOfWork'] ." ",  $row['GenreName']." </div><br>";
    echo " <div id = 'singlePaintingDesc'>". $row['Description'] ."</div><br>";
    echo " <div id = 'colorScheme'>Color Scheme</div><br>";
    echo " <div id = 'amountfaves'>X people have favourited this painting</div><br>";
    echo " <button type = 'button'> Add to you Favourites</button>";
    echo " <button type = 'button'> See My Favourites</button><br>";
    echo " <div id = 'ratings'>Ratings</div><br>";
    echo " <div id = 'reviews'>Reviews</div><br>";
    echo " <span id = 'reviewSpan'>If there was a review for this painting you could view it here</span>";
    echo "</div>";
}
catch (PDOException $e) {
 die( $e->getMessage() );
}
 ?>
    
</main>
</body>
<script src=""></script>
</html>