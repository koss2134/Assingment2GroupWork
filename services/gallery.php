<?php 
include_once __DIR__.'/../php/databaseIncude.php';              //includes database functions
header('Content-Type: application/json');                       //specfies that JSON data is being returned
     
    if(isset ($_GET['GalleryID'])){                                             //checks if the artist ID is supplied
         $sql = "SELECT * FROM Galleries WHERE GalleryID =".$_GET['GalleryID']; //creates the sql statement for retireving the gallery data
    }
    else {
        $sql = "SELECT * FROM Galleries ORDER BY  GalleryName";                   //if no id is supplied then it returns all the gallery data 
    }
    
    $result = sqlQuery($sql);                                                   //runs the sql statement through the database and gets the gallery data 
    $data = $result->fetchAll();                                                //puts all the gallery data into a variable
    
    $jsonData = json_encode($data);                                             //encodes all the data into the JSON formatt
    echo $jsonData;                                                             //returns the JSON data

?>