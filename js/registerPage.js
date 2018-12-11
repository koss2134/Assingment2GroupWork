window.addEventListener('load', function() {
    
    
    /**
     * 
     * This function checks to see is the information filled out on the register page is not empty or incorrect
     * 
     */
    function validateRegister() {
        
        var firstName = document.forms["registerForm"]["firstName"];            //grabs information from first name textbox
        var lastName = document.forms["registerForm"]["lastName"];              //grabs information from last name textbox
        var city = document.forms["registerForm"]["city"];                      //grabs information from city textbox
        var country = document.forms["registerForm"]["country"];                //grabs information from country textbox
        var email = document.forms["registerForm"]["email"];                    //grabs information from email textbox
        var pass = document.forms["registerForm"]["pass"];                      //grabs information from password textbox
        var passConfirm = document.forms["registerForm"]["passConfirm"];        //grabs information from confirm password textbox
        
        if (firstName.value == ""){                                             //makes sure the first name text box is not empty
            window.alert("First Name must be entered!");                        //displays error message
            return false;
        }
        
        if (lastName.value ==""){                                               //makes sure the last name text box is not empty
            window.alert("Last Name must be entered!");                         //displays error messagev
            return false;
        }
        
        if (city.value ==""){                                                   //makes sure the city text box is not empty
            alert("City Name must be entered!");                                //displays error message
            return false;
        }
        
        if (country.value ==""){                                                //makes sure the country text box is not empty
            alert("Country Name must be entered!");                             //displays error message
            return false;
        }
        
        if (email.value ==""){                                                  //makes sure the email text box is not empty
            alert("Email must be entered!");                                    //displays error message
            return false;
        }
        
        if(validateEmail(email.value) == false){                                //makes sure the email is the correct formatt
            alert("Email must be in valid format!");                            //displays error message
            return false;
        }
        
        if (pass.value ==""){                                                   //makes sure the password text box is not empty
            alert("Password must be entered!");                                 //displays error message
            return false;
        }
        
        if (pass.value != passConfirm.value){                                   //makes sure the confirmation pasword matched the original
            alert("Passwords must match!");                                     //displays error message
            return false;
        }
        
        return true;
    }
    
    /**
     * 
     * This function was borrowed from stack overflow. It checks to see if an email is in a correct formatt.
     * 
     * @param - email - takes in the email that need to be validated
     * 
     */
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    
});