<html lang="en">
<html>
<head>
    <link rel="stylesheet" href="css/default.css">
    <script>
        function validateRegister() {
        var firstName = document.forms["registerForm"]["firstName"];
        var lastName = document.forms["registerForm"]["lastName"];
        var city = document.forms["registerForm"]["city"];
        var country = document.forms["registerForm"]["country"];
        var email = document.forms["registerForm"]["email"];
        var pass = document.forms["registerForm"]["pass"];
        var passConfirm = document.forms["registerForm"]["passConfirm"];
        if (firstName.value == ""){
            alert("First Name must be entered!");
            firstName.focus();
            return false;
        }
        if (lastName.value ==""){
            alert("Last Name must be entered!");
            lastName.focus();
            return false;
        }
        if (city.value ==""){
            alert("City Name must be entered!");
            city.focus();
            return false;
        }
        if (country.value ==""){
            alert("Country Name must be entered!");
            country.focus();
            return false;
        }
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
        if (pass.value != passConfirm.value){
            alert("Passwords must match!");
            passConfirm.focus();
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
    <title>Register Page</title>
</head>
<body>
<?php
include 'php/header.php';
?>
<main>
    <div class="box">
    <div id="registerDiv">
        <form name="registerForm" action="php/register.php" onsubmit="return validateRegister()" method="POST">
            <h1>Register</h1>
            First Name: <input type="text" name="firstName"><br/>
            Last Name: <input type="text" name="lastName"><br/>
            City: <input type="text" name="city"><br/>
            Country: <input type="text" name="country"><br/>
            Email: <input type="text" name="email"><br/>
            Password: <input type="text" name="pass"><br/>
            Confirm Password: <input type="text" name="passConfirm"><br/>
            <input type="submit" value="Sign Up">
        </form>
    </div>
    </div>
</main>
</body>
<script src=""></script>
</html>