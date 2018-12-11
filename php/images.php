<?php 

    header('Content-Type: image/jpeg');                             //indicates that an image is being returned 
    
    $imgType = $_GET['imgType'];                                    //gets the type of image that needs to be returned
    $imgFileName = $_GET["imgFileName"];                            //gets the file name for the image that needs to be returned
    $imgSize = $_GET['imgSize'];                                    //gets the img size tfor the image that needs to be returned
    
    
    $imgname = "../images/$imgType/$imgSize/$imgFileName.jpg";      //creates the file path from the information in the queryString for the image
    
    $img = imagecreatefromjpeg($imgname);                           //creates the image from the file path 
    
    if( (isset($_GET["height"]) ) && (isset($_GET["width"]) ) ){    //checks to see if the height and width is specified 
         $img = imagescale($img,$_GET["height"],$_GET["width"]);    //scales the image to specified height and width
    }
    
    else if (isset($_GET['width'])){                                //checks to see if only the width was specified
        $img = imagescale($img,$_GET['width'], -1);                 //scales the image to the specifed width and adjust height accordingly 
    }
    
    imagejpeg($img);                                                //return the image 

?> 
