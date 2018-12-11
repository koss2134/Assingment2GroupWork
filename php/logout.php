<?php
session_start();
if(isset($_SESSION["loginStatus"])){        //checks users login status
    unset($_SESSION["loginStatus"]);        //unsets their status
}
if(isset($_SESSION["email"])){              //checks their email 
    unset($_SESSION["email"]);              //unsets email
}
if(isset($_SESSION["userID"])){             //checks user Id
    unset($_SESSION["userID"]);             //unsets user id
}
header('Location: /index.php');             //redirects to home page
?>