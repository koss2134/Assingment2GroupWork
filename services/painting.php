<?php 
include_once __DIR__.'/../php/databaseIncude.php';              //includes database functions
header('Content-Type: application/json');                       //specfies that JSON data is being returned

    if(isset($_GET["PaintingID"])){                             //checks if the painting ID is supplied
        $sql = "SELECT * FROM Paintings,Artists,Galleries WHERE Paintings.PaintingID=".$_GET['PaintingID'] . " AND Artists.ArtistID = Paintings.ArtistID AND Galleries.GalleryID = Paintings.GalleryID";//creates the sql statement for retireving the painting data
    }
    else if (isset($_GET["ArtistID"])){                         //checks if the artist ID is supplied
        $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.ArtistID=" . $_GET["ArtistID"];//creates the sql statement for retireving the painting data
    }
    else if (isset($_GET["GalleryID"])){                        //checks if the gallery ID is supplied
        $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE GalleryID =".$_GET["GalleryID"];//creates the sql statement for retireving the painting data
    }
    else if (isset($_GET["GenreID"])){                          //checks if the gallery ID is supplied
        $sql = "SELECT * FROM Genres JOIN Paintings JOIN PaintingGenres INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID         
                 WHERE Genres.GenreID =".$_GET['GenreID']."                                                                                 
                 AND Genres.GenreID = PaintingGenres.GenreID 
                 AND  PaintingGenres.PaintingID = Paintings.PaintingID";                                                                    //creates the sql statement for retireving the painting data
    }
    else{
        $sql = "SELECT * FROM Paintings";                       //if no id is supplied then it returns all the painting data 
    }
    $result = sqlQuery($sql);                                   //runs the sql statement through the database and gets the gallery data
    $data = $result->fetchAll();                                //puts all the gallery data into a variable
    
    $jsonData = json_encode($data);                             //encodes all the data into the JSON formatt
    echo $jsonData;                                             //returns the JSON data
    
?>