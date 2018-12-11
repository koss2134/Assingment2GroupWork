<?php
session_start();
//Checks to see if user is logged in and changes what is presented.

//This header is added to the top of all the pages 


if($_SESSION["loginStatus"] == true){   //This shows the header for users that are not logged in 
    echo "<header>
    <div id=\"head\">
    <table width='100%'>
    <tr>
    <td width='50%'>Fine Art Gallery</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href=\"index.php\">Home</a></td>
    <td><a href=\"about.php\">About</a></td>
    <td><a href=\"favoritesPage.php\">Favorites</a></td>
    <td><a href=\"/php/logout.php\">Log Out</a></td>
    </tr>
    </table>    
    </div>
</header>";
}

else{                                    //This shows the header for users that are logged in 
echo "<header>
    <div id=\"head\">
    <table width='100%'>
    <tr>
    <td width='50%'>Fine Art Gallery</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href=\"index.php\">Home</a></td>
    <td><a href=\"about.php\">About</a></td>
    <td><a href=\"loginPage.php\">Log In</a></td>
    <td><a href=\"registerPage.php\">Register</a></td>
    </tr>
    </table>    
    </div>
</header>";
}
?>