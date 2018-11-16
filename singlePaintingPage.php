<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Painting Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main class = 'singlePage'>
    <div id="paintingDiv" class = 'box'>
        <img src="css/testpics/testPainting.jpg"/>
    </div>
    <div id="paitingInfo" class = 'box'>
            <h2 id = 'singlePaintTitle'>Painting Title</h2>
            <h3 id = 'singlePaintArtist'>Artist</h3>
            <div id = singlePaintInfo>Gallery, year, genre</div><br>
            <div id = 'singlePaintingDesc'>Description</div><br>
            <div id = 'colorScheme'>Color Scheme</div><br>
            <div id = 'amountfaves'>X people have favourited this painting</div><br>
            <button type = 'button'> Add to you Favourites</button>
            <button type = 'button'> See My Favourites</button><br>
            <div id = 'ratings'>Ratings</div><br>
            <div id = 'reviews'>Reviews</div><br>
            <span id = 'reviewSpan'>If there was a review for this painting you could view it here</span>
    </div>
</main>
</body>
<script src=""></script>
</html>