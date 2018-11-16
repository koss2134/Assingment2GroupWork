<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Genre Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>

<main class = 'singlePage'>
    
    <div id="genreInfo" class = 'box'>
        
        <h2>Genre Info</h2>
        
        <label>Genre Name:</label><br>
        <div id = 'genreName'></div><br>
        <div id = ''>PHP will generate this image</div><br>
        <label>Era:</label><br>
        <span id = 'genreEra'></span><br>
        <label>Description:</label><br>
        <span id = 'genreEra'></span><br>
        <label>Link:</label><br>
        <a hrf ='' id = 'genreWebsite'>Link</a><br>
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
                this is the table we will use php to generate all the paintings 
    </div>
</main>
</body>
<script src=""></script>
</html>