<?php
include 'php/databaseInclude.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emailStatus = true;
    $sql = "SELECT UserName FROM CustomerLogon WHERE CustomerLogon=" . $_POST['email'] . ";";
    $results = sqlQuery($sql);
    foreach($results as $row){
        if($row['email'] == $_POST['email']){
            $emailStatus = true;
            //error message
            break;
        }
        else{
            $emailStatus = false;
        }
    }
    if($emailStatus == false){
        header('Location: /loginPage.php');
        //add new entry to database
    }
    header('Location: /index.php');
}
?>