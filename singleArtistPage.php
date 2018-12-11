<?php
require_once 'config.inc.php';

function createArtistInfo(){
    

        echo "<div id = 'artistName'></div><br>";               //creates div for the artists name
        echo "<div><img src = '' id = 'artPic'></div><br>";     //creates the div and img tag for the artist picture
        echo "<label>Nationality:</label> <br>";                //creates the label for the nationality 
        echo "<span id = 'nationality'></span><br><br>";        //creates the span for the nationality 
        echo "<label>Gender:</label><br>";                      //creates the label for the gender
        echo "<span id = 'artistGender'></span><br><br>";       //creates the span for the artists gender
        echo "<label>Year of Birth:</label><br>";               //creates the label for the year of birth
        echo "<span id = 'artistYOB'></span><br><br>";          //creates the span for the artist year of birth  
        echo "<label>Details:</label><br>";                     //creates the lable for the details 
        echo "<span id = 'artistDetails'></span><br><br>";      //creates the span for the artists details
        echo "  <label>Link: </label> ";                        //creates the label for the link 
        echo "<a href ='' id = 'artistWebsite'></a><br>";       //creates the a tag for the artist website
        echo "</div>";                                          //closes the div

    
}

$artistID = $_GET["ArtistID"];                                                  //gets the artistsID
echo "<script type = 'text/javascript'> var type = 'artist' </script>";         //passes the variable to JS page to know it is the artist page
echo "<script type = 'text/javascript'> var artistID = $artistID </script>";    //adds the artistID to the JS functinoality page
echo "<script type = 'text/javascript' src = 'js/artistServices.js'></script>"; //links to the js page that adds functionality
echo "<script type = 'text/javascript' src = 'js/paintingList.js'></script>";   //links to the js page that fills the painting list
?>

<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <link rel="stylesheet" href="css/default.css">
    <title>Single Artist Page</title>
</head>
    <body>
        <?php
        include 'php/header.php';                       //adds the header to the page
        ?>
    <main class = 'singlePage'>
        <div id="artistInfo" class= 'box'>
    
            <?php  
            createArtistInfo();                             //calls the funciton to create all the artists information
            ?>
        
    
        <div id = 'paintingList' class = 'box'>
            <h2>Paintings by this Artist</h2>
                <table  style="width:100%" id = 'paintTable'>
                    <tr>
                        <th> </th>
                        <th id = 'headingArtist'>Artist</th>
                        <th id = 'headingTitle'>Title</th>
                        <th id = 'year'>Year</th>
                    </tr>
                
    </main>
</body>
</html>