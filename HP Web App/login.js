//Lawson Kennan
//CS 4640 Project


//Click event for the login button. This clears the page and presents the user with the login form. The button for the login form handles the request.
$("#login").click(function(evt) {
  
    evt.preventDefault();
    $("#container").html("");
    var form = "<form action=\"LoginController.php\" method=\"POST\"><label for=\"username\">Username</label>" +
    "<input type=\"text\" id=\"username\" name=\"username\" /><br><label for=\"password\">Password</label><input type=\"password\" id=\"password\" name=\"password\" />" +
    "<br><button class=\"btn btn-default\" type=\"submit\" name=\"cmd\" value=\"Login\">Login</button></form>" +
    "<button class=\"btn btn-default\" type=\"submit\" onClick=\"window.location.reload()\" id=\"return\">Return</button>";
    $("#container").append(form);
});

//Similar as above. Click event for register, and the user is presented with the registration form. 
$("#register").click(function(evt) {
    evt.preventDefault();
    $("#container").html("");
    var form = "<form action=\"LoginController.php\" method=\"POST\">" +
    "<label for=\"username\">Username <input type=\"text\" id=\"username\" name=\"username\" /></label><br>" +
    "<label for=\"password\">Password <input type=\"password\" id=\"password\" name=\"password\" /></label><br>" +
    "<label for=\"first\">First Name <input type=\"text\" id=\"first\" name=\"first\" /></label><br>" +
    "<label for=\"last\">Last Name <input type=\"text\" id=\"last\" name=\"last\" /></label><br>" +
    "<label for=\"house\">House <select name=\"house\"><option value=\"Gryffindor\">Gryffindor</option><option value=\"Hufflepuff\">Hufflepuff</option><option value=\"Ravenclaw\">Ravenclaw</option><option value=\"Slytherin\">Slytherin</option></select></label><br>" +
    "<label for=\"user_type\">User Type <select name=\"user_type\"><option value=\"Student\">Student</option><option value=\"Professor\">Professor</option></select></label><br>" +
    "<button class=\"btn btn-default\" type=\"submit\" name=\"cmd\" value=\"Register\">Register</button></form><button class=\"btn btn-default\" type=\"submit\" onClick=\"window.location.reload()\" id=\"return\">Return</button>";

    $("#container").append(form);
    
    $("#return").css("display","inline");
});


//<button class=\"btn btn-default\" type=\"submit\" name=\"cmd\" value=\"Login\">Login</button>