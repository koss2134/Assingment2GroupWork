<?php
include_once __DIR__.'/php/databaseIncude.php';              //includes database functions
require_once 'config.inc.php';
require_once __DIR__.'/php/singlePaintingMethods.php';

/**
 * 
 * This function echos all the tags that will hold the information for the artist
 * 
 */
function createPaintingInfo(){
    $paintingID = $_GET["PaintingID"];                                      //gets the paintingID    
    $addFavURL = '/php/addFavorite.php?ID='.$paintingID;                    //get the url to the favourites page
    
    $ratingAmount = getRatings();                                           //gets the ammount of ratings for the painting
    $ratingNum = getRatingSum() / getRatings();                             //gets the average rating for the painting
    $ratingTotal = round($ratingNum,1);                                     //rounds the average to one decimal place

    echo " <div id='paintingDiv' class = 'box'>";                           //creates the div to hold the picture
    echo " <img id='painting' src=''/>";                                    //creates the img tag to hold the artist picture
    echo " </div>";                                                         //closes div for picture
    echo " <div id='paintingInfo' class = 'box'>";                          //create div for picture information
    echo " <div id = 'singlePaintTitle'></div>";                            //creates heading for painting title
    echo " <a href = ''  id ='singlePaintArtist'></a>";                     //creates heading for painting artist name
    echo "<div id='singlePaintInfo'></div>";                                //creates div for painting information
    echo " <a href ='' id = 'singlePaintingDesc'></a><br>";                 //creates div for painting description 
    echo " <div id = 'yearOfPainting'></div><br>";                          //creates div for year of work
    echo " <div id = 'colourScheme'>Color Scheme</div>" ;                   //creates div for painting color scheme
    echo " <div id = 'colourBox'>";
    fillColors();                                                           //fills color scheme
    echo "</div><br>";                                                      //closes div
    echo " <a href=\"" . $addFavURL . "\"  id = 'addToFavs' >Add to Favourites</a>";        //button to add to the favourite
    echo " <a href=\"favoritesPage.php\" id = 'seeFavs'>See My Favourites</a><br><br>";     //button to see all you favourites
    echo " <div id = 'amountfaves'> $ratingAmount people have rated this painting</div>";   //creates div for if ammount of people favorited functionality was added
    if($_SESSION["loginStatus"] == true){echo "<a href ='' >Vote</a>";}                     //checks if user is logged in, if they are displays the non functional vote button
    echo " <div id = 'ratingsLabel'>Ratings   $ratingTotal/5</div>";                        //creates div to show rating
    echo " <div id = 'reviewsLabel'>Reviews</div>";                                         //create label for review section
    echo " <div id = 'reviewsSection'>";                                                    //create div for review section
    fillComments();                                                                         //adds the comment to the review section
    echo "</div>";                                                                          //closes div
    echo "</div>";                                                                          //closes div
    
}

$paintingID = $_GET["PaintingID"];                                                  //gets the paintingID
echo "<script type = 'text/javascript'> var paintingID = $paintingID </script>";    //adds the paintingID variable to the js page
echo "<script type = 'text/javascript' src = 'js/paintingServices.js'></script>";   //links to the JS page for this pages functionality

?>

<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="css/singlePage.css">
        <link rel="stylesheet" href="css/default.css">
    <title>Single Painting Page</title> 
</head>
    <body>
        <?php
        include 'php/header.php';               //includes the header into the page
        ?>
        <main class = 'singlePage'>
            <?php  
            createPaintingInfo();                   //creates all the painting info for the page
             ?>


        </main>
    </body>
</html>