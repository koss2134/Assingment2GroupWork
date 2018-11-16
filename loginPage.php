<html lang="en">
<html>
<head>
    <link rel="stylesheet" href="css/default.css">
    <script>
        function validateLogin() {
        var email = document.forms["loginForm"]["email"];
        var pass = document.forms["loginForm"]["pass"];
        if (email.value ==""){
            alert("Email must be entered!");
            email.focus();
            return false;
        }
        //Checking regex for email validation
        if(validateEmail(email.value) == false){
            alert("Email must be in valid format!");
            return false;
        }
        if (pass.value ==""){
            alert("Password must be entered!");
            pass.focus();
            return false;
        }
        return true;
        }
        //Borrowed from stack overflow
        function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
        }
    </script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Login Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main>
    <div class="box">
    <div id="loginDiv">
        <form name="loginForm" action="php/login.php" onsubmit="return validateLogin()" method="POST">
        <h1>Login</h1>
        Email: <input type="text" name="email"><br/>
        Pass: <input type="text" name="pass"><br/>
        <input type="submit" value="submit">
        </form>
        No Account? <a href="registerPage.php"><u>Sign Up!</u></a>
    </div>
    </div>
</main>
</body>
<script src=""></script>
</html>