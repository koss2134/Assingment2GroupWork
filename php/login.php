<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        if(checkEmail($_POST["email"]) == true && checkPassword($_POST["pass"]) == true){
            $_SESSION["status"] = true;
            $_SESSION["email"] = $_POST["email"];
            $_Session["pass"] = $_POST["pass"];
            header('Location: /index.php');
        }
        else{
            header('Location: /registerPage.php');
        }
    }
}
function checkEmail($email){
    if($email == 'koss@123.com'){
        return true;
    }
    return false;
}
function checkPassword($pass){
    if($pass == 1234){
        return true;
    }
    return false;
}
?>