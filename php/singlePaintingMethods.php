<?php 
/**
 * 
 * This function gets the reviews for the current picture from the database and populates them in the single artist page
 * 
 */
function fillComments(){
    if(isset($_GET['PaintingID'])){             //checks to see if the paintingID is set
        $sql = 'SELECT * FROM Reviews JOIN Paintings ON Paintings.PaintingID = Reviews.PaintingID WHERE Paintings.PaintingID = '.$_GET['PaintingID'];   //generates sql statement
    }
    $result = sqlQuery($sql);                   //runs sql statement

    while($row = $result->fetch()){             //itterates through the reviews
        echo "<div id = 'comment'>";            //creates a div for the comment
        echo $row['Comment'];                   //outouts the comment
        echo "</div><hr>";                      //closes the div and puts a horizontal rul to distunguis the next comment

    }
    
    echo $result;                               //echos the result
    
}   

/**
 * 
 * This function get the amount of review for the current painting and passes it pack to the single artist page
 * 
 */
function getRatings(){
    if(isset($_GET['PaintingID'])){             //checks to see if paintingID is set
        $sql = "SELECT COUNT(Rating) FROM Reviews JOIN Paintings ON Paintings.PaintingID = Reviews.PaintingID WHERE Paintings.PaintingID = ".$_GET['PaintingID'];   //generates the sql statement
    }
    
    $result = sqlQuery($sql);                   //runs the sql statement 
    $row = $result->fetch();                    //gets the amount of ratings
    return $row[0];                             //returns the amount of ratings
}

/**
 * 
 * This function get the sum of reviews for the current painting and passes it pack to the single artist page
 * 
 */
function getRatingSum(){
    if(isset($_GET['PaintingID'])){             //checks to see if the paintingID is set 
        $sql = "SELECT SUM(Rating) FROM Reviews JOIN Paintings ON Paintings.PaintingID = Reviews.PaintingID WHERE Paintings.PaintingID = ".$_GET['PaintingID'];     //generate the sql statement
    }
    $result = sqlQuery($sql);               //runs the sql statement 
    $row = $result->fetch();                //gets the sum of all the ratings 
    return $row[0];                         //returns the sum of statings
}
    
/**
 * 
 * This function retireves the color scheme for the painting and displays spans of the color
 * 
 */
function fillColors(){
    
        if(isset($_GET['PaintingID'])){                                                             //checks if the painting ID is supplied
        $sql = 'SELECT JsonAnnotations FROM Paintings WHERE PaintingID =' .$_GET['PaintingID'];     //creates the sql statement for retireving the colour data
    }
    
    $result = sqlQuery($sql);                                               //runs the sql statement through the database and gets the colour data 
    $result = $result->fetch();                                             //puts all the artist data into a variable

    $data= $result['JsonAnnotations'];                                      //gets a variable with the JsonAnnotations
    
    $decoded = json_decode($data);                                          //decodes the JSON data into a php object 
    
     foreach($decoded->dominantColors as $color){                           //itterates throught the dominant colors for the current painting
          echo"<span class = 'color' style = 'background-color: $color->web; ' title = '$color->name'>&nbsp;</span>$color->name<br>"; //creates a span of the dominant color and sets the background to that color
      }
    
}

?>