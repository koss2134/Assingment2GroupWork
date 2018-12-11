<?php 
include_once __DIR__.'/../php/databaseIncude.php';              //includes database functions
header('Content-Type: application/json');                       //specfies that JSON data is being returned

    if(isset($_GET['PaintingID'])){                                                              //checks if the painting ID is supplied
        $sql = 'SELECT JsonAnnotations FROM Paintings WHERE PaintingID =' .$_GET['PaintingID']; //creates the sql statement for retireving the colour data
    }
    
    $result = sqlQuery($sql);                                               //runs the sql statement through the database and gets the colour data 
    $data = $result->fetchAll();                                            //puts all the artist data into a variable
    
    $jsonData = json_encode($data );                                        //encodes all the data into the JSON formatt
    echo $jsonData;                                                         //returns the JSON data

?>