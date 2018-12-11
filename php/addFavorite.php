<?php
session_start();
include_once __DIR__.'/../php/databaseIncude.php';          //adds database functions 


if(isset($_SESSION["userID"])){                 //checks id userId is set                                                    //adds said painting to the user in the databse.
    if(isset($_GET["ID"])){                     //checks the ID
        try{
            $pdo = createPDO();                 //create database connection
            $sql = "INSERT INTO Favorites (CustomerID, PaintingID) VALUES (?, ?)";       //prepares sql to add the favorites to the database
            $stm = $pdo->prepare($sql);                                                 //adds the favorites to the database
            $stm->execute([$_SESSION["userID"], $_GET["ID"]]);                           //sets which user and painting that favourite is baing added to 
            $stm = null;                                                                //clears variable
            header('Location: /favoritesPage.php');
        }
        catch(Exception $e) {                                            //to catch duplicates being added.
                die($e->getMessage());
            }
        header('Location: /favoritesPage.php');  //redirect if query fails for whatever reason.
    }
}
else{
       alert('Please log in to add to your favourites');                                    //Message to tell them to login please.
}
?>