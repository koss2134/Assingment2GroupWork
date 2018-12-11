
<?php
require_once 'config.inc.php';              //adds the database information

function createGenreInfo(){
            

    echo "<div id='genreName'></div><br>";                          //create div for genre name
    echo "<div><img src = '' id = 'genrePicture'></div><br>";       //creates div and img tag for the genre picture
    echo "<label>Era:</label><br>";                                 //create the label for the ere
    echo "<span id='genreEra'></span><br><br>";                     //creates the span for the era
    echo "<label>Description:</label><br><br>";                     //creates the label for the description 
    echo "<span id='genreDesc'></span><br><br>";                    //creates the span for the description
    echo "<label>Link:  </label>";                                  //creates the label for the link 
    echo "<a href ='' id = 'link'> on wikipedia</a><br>";           //creates the a tag for the link
    echo "</div>";                                                  //closes div

}

$genreID = $_GET["GenreID"];                                                    //gets the GenreID
echo "<script type = 'text/javascript'> var type = 'genre' </script>";          //passes the variable to JS page to know it is the genre page
echo "<script type = 'text/javascript'> var genreID = $genreID </script>";      //adds the genreID to the JS functinoality page
echo "<script type = 'text/javascript' src = 'js/genreServices.js'></script>";  //links to the js page that adds functionality
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";   //links to the js page that fills the painting list
?>

<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <link rel="stylesheet" href="css/default.css">
    
    <title>Single Genre Page</title>                        
</head>
    <body>
        <?php
        include 'php/header.php';                   //includes header to the page
        ?>

        <main class = 'singlePage'>
            
            <div id="genreInfo" class = 'box'>
                
        <?php  
        createGenreInfo();                          //adds all the genre information sections
        ?>
        
            <div id = 'paintingList' class = 'box'>
                
                <h2>Paintings in this Genre</h2>
                        <table  style="width:100%" id = 'paintTable'>
                            <tr>
                            <th> </th>
                            <th id = 'headingArtist'>Artist</th>
                            <th id = 'headingTitle'>Title</th>
                            <th id = 'year'>Year</th>
                        </tr>
                    </table>
            </div>
        </main>

    </body>
</html>