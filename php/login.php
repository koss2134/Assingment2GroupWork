<?php
include_once __DIR__.'/../php/databaseIncude.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        if(checkLogin() == true){
            $_SESSION["status"] = true;
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["pass"] = $_POST["pass"];
            header('Location: /index.php');
        }
        else{
            header('Location: /registerPage.php');
        }
    }
}
function checkLogin (){
    try {
        $pdo = createPDO();
        $sql = 'SELECT * FROM CustomerLogon WHERE UserName=:email';
        $email = $_POST['email'];
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        foreach($statement as $row) {
            if($row['UserName'] == $_POST['email']){
                $hashed_pass = md5($_POST['pass'] . $row['Salt']);
                if($row['Pass'] == $hashed_pass){
                     return true;
                }
                else {
                    return false;
                }
            }
            else{
                return false;
            } 
        }
        $pdo = null;
    }
    catch (PDOException $e){
        die( $e->getMessage());
    }
    return false;
}
?>