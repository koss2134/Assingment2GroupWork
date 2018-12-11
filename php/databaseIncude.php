<?php

define('DBHOST', 'localhost');                      //sets host for database connection
define('DBNAME', 'art');                            //sets which database to use 
define('DBUSER', getenv('C9_USER'));                //sets who the user is
define('DBPASS', '');                               //sets the password
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");  //sets the connection

/**
 * 
 * This function runs the sql statement passed to it through the database
 * 
 * @param - sql - takes in the sql statement 
 * 
 */
function sqlQuery ($sql) {
    try{
        $pdo = createPDO();             //create the database connection    
        $result = $pdo->query($sql);    //runs the sql statement 
        $pdo = null;                    //clears connection
        return $result;                 //returns data retrieved from database
    }
    catch (PDOException $e){
        die( $e->getMessage() );        //checks and displays errors
    }
}
/**
 * 
 * This function creates the connection to the database
 * 
 */
function createPDO (){
    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);                   //creates new PDO
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets the PDO attributes
        return $pdo;                                                    //returns the connection
    }
    catch (PDOException $e){
        die( $e->getMessage() );    //checks and dsiplays errors
    }
}


?>