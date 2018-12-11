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
include_once 'php/databaseIncude.php';
include 'php/header.php';
?>
<main>
    <div class="box">
        <h1>Favorites</h1>
        <div id=tableDiv>
            <form id="favoritesForm" method="POST" action="/php/removeFavorite.php">
                <table id="favoritesTable">
                <?php
                    $sql = "SELECT * FROM Favorites WHERE CustomerID =" . $_SESSION['userID'];
                    $results = sqlQuery($sql);
                    foreach($results as $row){
                        $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.PaintingID =" . $row['PaintingID'];
                        $paintings = sqlQuery($sql);
                        foreach($paintings as $painting){
                            $stm = "<tr><td><img src=\"php/images.php?imgType=paintings&imgSize=square&width=75&imgFileName=" . $painting['ImageFileName'] . "\"></td><td>" . $painting['Title'] . "</td><td>" . $painting['FirstName'] . " " . $painting['LastName'] . "</td><td>" . $painting['YearOfWork'] . "</td><td><a href=\"/php/removeFavorite.php?ID=" . $painting['PaintingID'] . "\"><button type=\"button\">Remove</button></a></td></tr>";
                            echo $stm;
                        }
                    }
                ?>
                </table>
                <input type="submit" value="Remove All" id="submitButton">
            </form>
        </div>
    </div>
</main>
</body>
<script src=""></script>
</html>