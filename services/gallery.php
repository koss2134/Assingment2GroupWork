<?php 
require_once "php/databaseIncude.php";
header('Content-Type: application/json');
     
    if(isset ($_GET['GalleryID'])){
         $sql = "SELECT * FROM Galleries WHERE GalleryID =".$_GET['GalleryID'];
    }
    else {
        $sql = "SELECT * FROM Galleries";
    }
    $result = sqlQuery($sql);
    $data = $result->fetch();
    
    $jsonData = json_encode($data);
    echo $jsonData;

?>