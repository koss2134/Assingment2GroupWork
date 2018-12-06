<?php 
include_once __DIR__.'/../php/databaseIncude.php';
header('Content-Type: application/json');

    if(isset ($_GET['ArtistID'])){
         $sql = "SELECT * FROM Artists WHERE ArtistID =".$_GET['ArtistID'];
    }
    else {
        $sql = "SELECT * FROM Artists";
    }
    $result = sqlQuery($sql);
    $data = $result->fetchAll();
    
    $jsonData = json_encode($data);
    echo $jsonData;

?>