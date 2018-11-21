<?php 
require_once 'config.inc.php';

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");

function getGallery() {
    try {
     $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     if(isset ($_GET['GalleryID'])){
         $sql = "SELECT * FROM Galleries WHERE GalleryID =".$_GET['GalleryID'];
        }
        else {
            $sql = "SELECT * FROM Galleries";
        }
    $result = $pdo->query($sql);

    $result = $pdo->query($sql);
    $data = $result->fetch();
    
    return $data;
    }
    
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

}
?>