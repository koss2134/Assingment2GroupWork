<?php 
include '../php/databaseIncude.php';
header('Content-Type: application/json');

    if(isset($_GET["PaintingID"])){
        $sql = "SELECT * FROM Paintings,Artists WHERE Paintings.PaintingID=".$_GET['PaintingID'] . " AND Artists.ArtistID = Paintings.ArtistID";
    }
    else if (isset($_GET["ArtistID"])){
        $sql = "SELECT * FROM Paintings,Artists WHERE Paintings.ArtistID =".$_GET["ArtistID"] . " AND Paintings.ArtistID = Artists.ArtistID";
    }
    else if (isset($_GET["GalleryID"])){
        $sql = "SELECT * FROM Paintings WHERE GalleryID =".$_GET["GalleryID"];
    }
    else if (isset($_GET["GenreID"])){
        $sql = "SELECT * FROM Genres,Paintings,PaintingGenres 
                 WHERE Genres.GenreID =".$_GET['GenreID']." 
                 AND Genres.GenreID = PaintingGenres.GenreID 
                 AND  PaintingGenres.PaintingID = Paintings.PaintingID";
    }
    else{
        $sql = "SELECT * FROM Paintings";
    }
    $result = sqlQuery($sql);
    $data = $result->fetch();
    
    $jsonData = json_encode($data);
    echo $jsonData;
    
?>