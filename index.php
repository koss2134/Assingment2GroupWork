<?php
require_once 'config.inc.php';
?>

<link rel="stylesheet" href="css/index.css">
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">

    <title>Home Page</title>
</head>
    <body>
        <?php
        include 'php/header.php';
        ?>
    <main class="container">

        <!--      galleryList                     -->
        <div id= 'GalleryList'>
             <h2 id = 'galleryHeading'class = 'indexHeading' >Galleries</h2>
        </div>
        <script type = 'text/javascript' src = 'js/indexGalleryServices.js'></script>
        
        
        <!--      Artist List                     -->
            <h2 class = 'indexHeading'  id = "artistHeading">Artists</h2>
                <div id="artistList" style="display: flex;flex-flow: row wrap;">
            </div>
        <script type = 'text/javascript' src = 'js/indexArtistService.js'></script>
        
        
        <!--      Genre List                     -->
        <h2 class = 'indexHeading' id = "genreHeading">Genres</h2>
            <div id="genreList" style="display: flex;flex-flow: row;"></div>
        
        <script type = 'text/javascript' src = 'js/indexGenresService.js'></script>

 

 
</main>
</body>
<script src=""></script>
</html>