<?php 
require_once "php/databaseIncude.php";
header('Content-Type: application/json');

    if(isset ($_GET['ArtistID'])){
         $sql = "SELECT * FROM Artists WHERE ArtistID =".$_GET['ArtistID'];
        }
    else {
        $sql = "SELECT * FROM Artits";
    }
    $result = sqlQuery($sql);
    $data = $result->fetch();
    
    $jsonData = json_encode($data);
    echo $jsonData;

?>