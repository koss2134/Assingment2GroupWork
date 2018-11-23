<?php 
include_once __DIR__.'/../php/databaseIncude.php';
header('Content-Type: application/json');
    
    if(isset ($_GET['GenreID'])){ 
         $sql = "SELECT * FROM Genres WHERE GenreID =".$_GET['GenreID'];
     }
    else {
        $sql = "SELECT * FROM Genres";
    }
    $result = sqlQuery($sql);
    $data = $result->fetch();
    
    $jsonData = json_encode($data);
    echo $jsonData;

?>