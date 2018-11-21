<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/favorites.css">
    <title>Favorites Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main>
    <div class="box">
        <h1>Favorites</h1>
        <div id=tableDiv>
            <form id="favoritesForm" method="post" action="php/favorites.php">
                <table id="favoritesTable">
                <tr>
                    <td>IMG</td>
                    <td>Title</td>
                    <td>Artist</td>
                    <td>Year</td>
                    <td>RemoveButton</td>
                </tr>
                <tr>
                    <td>IMG</td>
                    <td>Title</td>
                    <td>Artist</td>
                    <td>Year</td>
                    <td>RemoveButton</td>
                </tr>
                </table>
            </form>
        </div>
        <button type="submit" value="" form="favoritesForm">Remove All</button> 
        
    </div>
</main>
</body>
<script src=""></script>
</html>