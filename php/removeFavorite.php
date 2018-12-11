<?php
include_once __DIR__.'/../php/databaseIncude.php';
session_start();
//Checking for single painting removal and the isset.
if(isset($_GET["ID"]) && isset($_SESSION["userID"])){
    try{
        $pdo = createPDO();
        $sql = "DELETE FROM Favorites WHERE CustomerID = " . $_SESSION["userID"] . " AND PaintingID = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([$_GET["ID"]]);
        $stm = null;
    }
    catch (PDOEcception $e){
        die( $e->getMessage());
    }
    header('Location: /favoritesPage.php');
}
//Remove all button has been clicked and this checks to see if that is the case and starts the proccess.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_SESSION["userID"])){
        try{
            $pdo = createPDO();
            $sql = "DELETE FROM Favorites WHERE CustomerID = ?";
            $stm = $pdo->prepare($sql);
            $stm->execute([$_SESSION["userID"]]);
            $stm = null;
        }
        catch (PDOEcception $e){
                die( $e->getMessage());
        }
        header('Location: /favoritesPage.php');
    }
}
else{
    alert('Please log in to remove your favourites'); 
}
?>