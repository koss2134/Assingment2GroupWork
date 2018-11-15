<?php
define('DBHOST', 'localhost');
define('DBNAME', 'art');
define('DBUSER', getenv('C9_USER'));
define('DBPASS', '');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

function sqlQuery ($sql, $pdo) {
    try{
        $result = $pdo->query($sql);
        return $result;
    }
    catch (PDOException $e){
        die( $e->getMessage() );
    }
}
function createPDO ($conSTR, $user, $pass){
    $pdo = new PDO($conSTR, $user, $pass);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
function createDefaultPDO (){
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
?>