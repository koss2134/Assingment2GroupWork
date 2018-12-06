<?php 
include_once __DIR__.'/../php/databaseIncude.php';
header('Content-Type: application/json');
     
    if(isset ($_GET['GalleryID'])){
         $sql = "SELECT * FROM Galleries WHERE GalleryID =".$_GET['GalleryID'];
    }
    else {
        $sql = "SELECT * FROM Galleries";
    }
    $result = sqlQuery($sql);
    $data = $result->fetchAll();
    
    $jsonData = json_encode($data);
    echo $jsonData;

?>