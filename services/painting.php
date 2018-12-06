<?php 
include_once __DIR__.'/../php/databaseIncude.php';
header('Content-Type: application/json');

    if(isset($_GET["PaintingID"])){
        $sql = "SELECT * FROM Paintings,Artists,Galleries WHERE Paintings.PaintingID=".$_GET['PaintingID'] . " AND Artists.ArtistID = Paintings.ArtistID";
    }
    else if (isset($_GET["ArtistID"])){
        $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.ArtistID=" . $_GET["ArtistID"];
    }
    else if (isset($_GET["GalleryID"])){
        $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE GalleryID =".$_GET["GalleryID"];
    }
    else if (isset($_GET["GenreID"])){
        $sql = "SELECT * FROM Genres JOIN Paintings JOIN PaintingGenres INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
                 WHERE Genres.GenreID =".$_GET['GenreID']." 
                 AND Genres.GenreID = PaintingGenres.GenreID 
                 AND  PaintingGenres.PaintingID = Paintings.PaintingID";
    }
    else{
        $sql = "SELECT * FROM Paintings";
    }
    $result = sqlQuery($sql);
    $data = $result->fetchAll();
    
    $jsonData = json_encode($data);
    echo $jsonData;
    
?>