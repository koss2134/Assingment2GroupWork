<?php
require_once 'config.inc.php';
?>

<html lang="en">
<html>
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
require_once 'services/genre.php';

$row = getGenre();
        
    echo "<label>Genre Name:</label><br>";
    echo "<div id = 'genreName'>". $row['GenreName'] ."</div><br>";
    echo "<div id = ''>PHP will generate this image</div><br>";
    echo "<label>Era:</label><br>";
    echo "<span id = 'genreEra'>". $row['EraName'] ."</span><br>";
    echo "<label>Description:</label>". $row['Description'] ."<br>";
    echo "<span id = 'genreEra'>". $row['EraName'] ."</span><br>";
    echo "<label>Link:</label>";
    echo "<a href ='". $row['Link'] ."' >". $row['GenreName'] ." on wikipedia</a><br>";
    echo "</div>";

?>

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
                    </tr>
                    <!-- artist info -->
                    
<?php  
// output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM Genres,Paintings,PaintingGenres 
                 WHERE Genres.GenreID =".$_GET['GenreID']." 
                 AND Genres.GenreID = PaintingGenres.GenreID 
                 AND  PaintingGenres.PaintingID = Paintings.PaintingID";
                 
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
    </div>
</main>

</body>
<script src=""></script>
</html>