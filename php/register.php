<?php
include_once __DIR__.'/../php/databaseIncude.php';
//Check to see if the right request was being made and if all the info has been set. It then check if the email is already assigned to an account before starting the process to add a new user.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if( isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['city']) && isset($_POST['country'])){
        try{
            $emailStatus = false;
            $sql = "SELECT UserName FROM CustomerLogon WHERE UserName='" . $_POST['email'] . "';";
            $results = sqlQuery($sql);
            foreach($results as $row){
                if($row['email'] == $_POST['email']){
                    $emailStatus = true;
                    //error message saying email already exists
                    break;
                }
            }
            if($emailStatus == false){
                addNewUser();
                header('Location: /loginPage.php');
            }
            else{
                header('Location: /index.php');
            }
            $pdo = null;
        }
        catch (PDOEcception $e){
            die( $e->getMessage());
        }
    }
}
//This function adds the new user to both tables in the database.
function addNewUser() {
    try{
        //Adding to CustomerLogon
        $pdo = createPDO();
        $sql = "INSERT INTO CustomerLogon (UserName, Pass, Salt) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $salt = createSalt();
        $hashed_pass = md5($_POST['pass'] . $salt);
        $statement->execute([$_POST['email'], $hashed_pass, $salt]);
        $statement = null;
        //Adding To Customers
        //Getting ID from CustomerLogon
        $sq12 = "SELECT * FROM CustomerLogon WHERE UserName =?";
        $statement2 = $pdo->prepare($sq12);
        $statement2->execute([$_POST['email']]);
        $id = $statement2->fetch();
        $statement2 = null;
        //Adding new entry with ID
        $sql = "INSERT INTO Customers (CustomerID, FirstName, LastName, City, Country, Email) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$id[0], $_POST['firstName'], $_POST['lastName'], $_POST['city'], $_POST['country'], $_POST['email']]);
        $statement = null;
    }
    catch (PDOEcception $e){
        die( $e->getMessage());
    } 
}
//Function to create 32 digit salt.
function createSalt () {
    $chars = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ1234567890";
    $salt = "";
    for($i=0; $i<32; $i++){
        $randomChar = $chars[mt_rand(0,61)];
        $salt .= $randomChar;
    }
    return $salt;
}
?>