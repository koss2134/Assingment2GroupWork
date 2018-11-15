window.addEventListener('load', function() {
    function validateRegister() {
        var firstName = document.forms["registerForm"]["firstName"];
        var lastName = document.forms["registerForm"]["lastName"];
        var city = document.forms["registerForm"]["city"];
        var country = document.forms["registerForm"]["country"];
        var email = document.forms["registerForm"]["email"];
        var pass = document.forms["registerForm"]["pass"];
        var passConfirm = document.forms["registerForm"]["passConfirm"];
        if (firstName.value == ""){
            window.alert("First Name must be entered!");
            return false;
        }
        if (lastName.value ==""){
            window.alert("Last Name must be entered!");
            return false;
        }
        if (city.value ==""){
            alert("City Name must be entered!");
            return false;
        }
        if (country.value ==""){
            alert("Country Name must be entered!");
            return false;
        }
        if (email.value ==""){
            alert("Email must be entered!");
            return false;
        }
        if(validateEmail(email.value) == false){
            alert("Email must be in valid format!")
            return false;
        }
        if (pass.value ==""){
            alert("Password must be entered!");
            return false;
        }
        if (pass.value != passConfirm.value){
            alert("Passwords must match!");
            return false;
        }
        return true;
    }
    //Borrowed from stack overflow
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
});