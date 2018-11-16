<html lang="en">
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="css/singlePage.css">
    <title>Single Artist Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main class = 'singlePage'>
    <div id="artistInfo" class= 'box'>
        
         <label>Artist Name:</label><br>
         
        <div id = 'ArtistName'></div><br>
        <div id = ''>PHP will generate image of artist</div><br>
        <label>Nationality:</label><br>
        <span id = 'nationality'></span><br>
        <label>Gender:</label><br>
        <span id = 'artistGender'></span><br>
        <label>Year of Birth:</label><br>
        <span id = 'artistYOB'></span><br>
        <label>Details:</label><br>
        <span id = 'artistDetails'></span><br>
        <a hrf ='' id = 'artistWebsite'>Link</a><br>
        
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
            
</main>
</body>
<script src=""></script>
</html>