<?php 
include_once __DIR__.'/../php/databaseIncude.php';              //includes database functions
header('Content-Type: application/json');                       //specfies that JSON data is being returned

    if(isset ($_GET['ArtistID'])){                                          //checks if the artist ID is supplied
         $sql = "SELECT * FROM Artists WHERE ArtistID =".$_GET['ArtistID']; //creates the sql statement for retireving the artist data
    }
    else {
        $sql = "SELECT * FROM Artists";                                     //if no id is supplied then it returns all the artist data 
    }
    
    $result = sqlQuery($sql);                                               //runs the sql statement through the database and gets the artist data 
    $data = $result->fetchAll();                                            //puts all the artist data into a variable
    
    $jsonData = json_encode($data);                                         //encodes all the data into the JSON formatt
    echo $jsonData;                                                         //returns the JSON data

?>