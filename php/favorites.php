<?php
include 'php/databaseInclude.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"])){
    //remove sleceted ID
    header('Location: /favoritesPage.php');
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Remove all favorites for user.
    header('Location: /favoritesPage.php');
}
?>