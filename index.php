<?php

require_once 'config.inc.php';

?>

<link rel="stylesheet" href="css/index.css">
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <!--link rel="stylesheet" href="css/index.css"-->
    <title>Home Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main class="container">
<div id="galleryList">
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
try {
 $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT GalleryID, GalleryName FROM Galleries";
 $result = $pdo->query($sql);
//$num_rows = mysql_num_rows($result);
//$number_of_rows = $result->rowCount();
//echo "Number of rows returned:". $number_of_rows;

 echo "<ul style='list-style-type:none'>";
 
 while ($row = $result->fetch()) {
   
  echo "<li><A href='singleGalleryPage.php?GalleryID=". $row['GalleryID'] ."'>". $row['GalleryName']  . "</a></li>";

 }
//</ul>
 
}
catch (PDOException $e) {
 die( $e->getMessage() );
}
  ?>
  <a href = "singlePaintingPage.php?PaintingID=">TEST LINK FOR PAINTING</a>
    </div>
    <div id="artistList"><!-- max-height: 1%; -->
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
try {
 $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT Artists.ArtistID,Firstname, LastName,ImageFileName  
         FROM Artists,Paintings 
         WHERE Artists.ArtistID =Paintings.ArtistID
         Group by Artists.ArtistID";
 $result = $pdo->query($sql);

//echo "test!!!!!!!!!!!!!!!!!";

 while ($row = $result->fetch()) {
echo "<div style='float: right;'>";
         
      echo "<div > <img src='images/1.jpg'></div>"; 
      echo " <div> <A href='singleArtistPage.php?ArtistID=". $row['ArtistID'] ."'>". $row['FirstName'] . $row['LastName'] . "</a> </div> ";
  
echo " </div>";
 }


}
catch (PDOException $e) {
 die( $e->getMessage() );
}
  ?>
    </div>
    <div id="genreList">
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
try {
 $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM Genres";
 $result = $pdo->query($sql);


 while ($row = $result->fetch()) {

echo "<div style='float: right;'>";
  echo "<div><img src='images/1.jpg'></div>";
  echo " <div> <A href='singleGenrePage.php?GenreID=". $row['GenreID'] ."'>" . $row['GenreName'] . "</a> </div> ";
echo "</div>";
 }

}
catch (PDOException $e) {
 die( $e->getMessage() );
}
  ?>

    </div>
</main>
</body>
<script src=""></script>
</html>