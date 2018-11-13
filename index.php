<?php

require_once 'config.inc.php';

?>


<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Home Page</title>
</head>
<body>
<header>
    <img src="" id="logo"/>
    <h1 id="websiteTitle">Title of website</h1>
    <h2 id="websiteSubtitle">subtittle</h2>
    <span id="headerLinks">LINK TO PAGES HERE</span>
    


</header>
<main class="container">
<div id="head">
<table width='100%'>
<tr>
    <td width='50%'>Logo</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>ICON<BR>Home</td>
    <td>ICON<BR>About</td>
    <td>ICON<BR>Log In/Out</td>
    <td>ICON<BR>Favorites</td>
</tr>
</table>    
</div>

    <div id="galleryList">
               <?php  
                   // output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)

define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME .";charset=utf8mb4;");
try {
 $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT GalleryID, GalleryName FROM Galleries";
 $result = $pdo->query($sql);

 echo "<ul style='list-style-type:none'>";
 
 while ($row = $result->fetch()) {
   
  echo "<li><A href='". $row['GalleryID'] ."'>". $row['GalleryName']  . "</a></li>";

 }
//</ul>
 
}
catch (PDOException $e) {
 die( $e->getMessage() );
}
  ?>
  
    </div>
    <div id="artistList">
artistList
    </div>
    <div id="genreList">
genrelist
    </div>
</main>
</body>
<script src=""></script>
</html>