<?php
define('DBHOST', 'localhost');
define('DBNAME', 'art');
define('DBUSER', getenv('C9_USER'));
define('DBPASS', '');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

function sqlQuery ($sql) {
    try{
        $pdo = createPDO();
        $result = $pdo->query($sql);
        $pdo = null;
        return $result;
    }
    catch (PDOException $e){
        die( $e->getMessage() );
        return "";
    }
    return "";
}
function createPDO (){
    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (PDOException $e){
        die( $e->getMessage() );
    }
}
?>