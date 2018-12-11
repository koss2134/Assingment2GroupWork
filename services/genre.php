<?php 
include_once __DIR__.'/../php/databaseIncude.php';              //includes database functions
header('Content-Type: application/json');                       //specfies that JSON data is being returned
    
    if(isset ($_GET['GenreID'])){                                                                               //checks if the genre ID is supplied
         $sql = "SELECT * FROM Genres JOIN Eras ON Genres.EraID = Eras.EraID WHERE GenreID =".$_GET['GenreID']; //creates the sql statement for retireving the genre data
     }
    else {
        $sql = "SELECT * FROM Genres";                                                                          //if no id is supplied then it returns all the genre data
    }
    
    $result = sqlQuery($sql);                                                                                   //runs the sql statement through the database and gets the genre data 
    $data = $result->fetchAll();                                                                                //puts all the genre data into a variable
    
    $jsonData = json_encode($data);                                                                             //encodes all the data into the JSON formatt
    echo $jsonData;                                                                                             //returns the JSON data

?>