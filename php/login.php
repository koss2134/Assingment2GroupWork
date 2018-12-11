<?php
include_once __DIR__.'/../php/databaseIncude.php';
session_start();
//Check the requests type and isset of POSTS. Then starts the check login process, finally setting the SESSION.
if($_SERVER["REQUEST_METHOD"] == "POST"){                   //makes sure the method is post
    if(isset($_POST['email']) && isset($_POST['pass'])){    //makes sure the email and password are set
    
        if(checkLogin() == true){                           //sees if user is logged in
           
            $_SESSION["loginStatus"] = true;
            $_SESSION["email"] = $_POST["email"];           //Sets sesssion varibales and loginstatus to true
            header('Location: /index.php');
        }
        else{
            header('Location: /registerPage.php');          //if user is not logged in it sends them to register page
        }
    }
}
/**
 * 
 * This functions checks the login details with the PDO, then combining password and salt to check against saved hash.
 * 
 */

function checkLogin (){
    try {
        $pdo = createPDO();                                             //creates PDO
        $sql = 'SELECT * FROM CustomerLogon WHERE UserName=:email';     //generates SQL satatement
        $email = $_POST['email'];                                       //gets the users email 
        $statement = $pdo->prepare($sql);                               //runs the sql
        $statement->bindValue(':email', $email);                        //checks bind value with email
        $statement->execute();                                          //executes
        //Checking all the rows.
        foreach($statement as $row) {                                   //itterates through all the rows
            if($row['UserName'] == $_POST['email']){                    //checks the email
                $hashed_pass = md5($_POST['pass'] . $row['Salt']);      //checks password and salt
                                   
                if($row['Pass'] == $hashed_pass){                        //Will return true if passwords hashes match and Set USERID.
                    $_SESSION["userID"] = $row['CustomerID'];           //checks if it matches
                    return true;
                }
                else {
                    return false;                                       //return false if fails
                }
            }
            else{
                return false;                                           //return false if fails
            } 
        }
        $pdo = null;                                                    //close connection
    }
    catch (PDOException $e){
        die( $e->getMessage());                                         //check for errors
    }
    return false;
}
?>