<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Login Page</title>
</head>
<body>
<header>
    <img src="" id="logo"/>
    <h1 id="websiteTitle">Title of website</h1>
    <h2 id="websiteSubtitle">subtittle</h2>
    <span id="headerLinks">LINK TO PAGES HERE</span>
</header>
<main>
    <div id="loginDiv">
        <form action="php/login.php" method="POST">
        <h1>Login</h1>
        Email: <input type="text" name="email"><br/>
        Pass: <input type="text" name="pass"><br/>
        <input type="submit" value="submit">
        </form>
        No Account? <a href="registerPage.php"><u>Sign Up!</u></a>
    </div>

</main>
</body>
<script src=""></script>
</html>