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
            
       <table>
        <TR>
            <td>            
                <h1>Login</h1>
            </td>
            <td>            

            </td>
        </tr>
        <TR>
            <td>            
            Email:           
        </td>
            <td>            
         <input type="text" name="email">
             </td>
        </tr>

        <TR>
            <td>            
        Pass:
            </td>
            <td>            
        <input type="text" name="pass">
                     </td>
        </tr>
        <TR>
            <td>            
            </td>
            <td>            
        <input type="submit" value="submit">
            </td>
        </tr>

        </form>
        <TR>
            <td>            
            </td>
            <td>            
        No Account? <a href="registerPage.php"><u>Sign Up!</u></a>

            </td>
        </tr>
        
    </div>
    </div>
</main>
</body>
<script src=""></script>
</html>