<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Gallery Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>

<main class = 'singlePage'>
    
     <div id = 'galInfo' class = 'box'>
         
                <h2>Gallery Name</h2>
                
                <div id = 'info'>
                    <label>Gallery Name:</label><br>
                    <span id = 'galleryName'></span><br>
                    <label>Native Name: </label><br>
                    <span id = 'nativeName'></span><br>
                    <label>City: </label><br>
                    <span id = 'cityName'></span><br>
                    <label>Address: </label><br>
                    <span id = 'address'></span><br>
                    <label>Country: </label><br>
                    <span id = 'country'></span><br>
                    <label>Link: </label><br>
                    <span><a href ="" id = 'website'>Link</a></span><br>
                
                </div>
    </div>
    
    <div id = 'map' class = 'box'>
        MAP this is where the map will be generated using JS
    </div>
    
    <div id = 'paintingList' class = 'box'>
        
                <table  style="width:100%">
                     <tr>
                         <th> </th>
                         <th id = 'headingArtist'>Artist</th>
                         <th id = 'headingTitle'>Title</th>
                         <th id = 'year'>Year</th>
                    </tr>
                    <tr>
                        <td>img</td>
                        <td>title</td>
                        <td>artist</td>
                        <td>year</td>
                    </tr><hr>
                    </table>
                    his is the table we will use php to generate all the paintings 
    </div>
</main>
</body>
<script src=""></script>
</html>