//Lawson Kennan
//CS4640 Project

//Click event for the return home button. Redirects user to the home page.
$("#return_home").click(function(evt) {
    evt.preventDefault();
    document.location = 'home.php';
    
});

//Logout button in top right. Calls the controller, logs user out, and unsets the correct cookies. Redirects user to the login page.
$("#logout").click(function(evt) {
   evt.preventDefault();
   var request = $.ajax({
        type : "POST",
        url : "HomeController.php",
        dataType: "text",
        data : {logout:"true"},
        cache : "false"
   });
   
   request.done(function() {
        document.location='login.html';
   });
   
    
});

//Redirects the user back to the add points page if they wish to do so.
$("#add_more_points").click(function(evt) {
   evt.preventDefault();
   document.location='add_points.php'; 
});

//Handler for success of form submission. The form is submitted, and the controller is called. Two cases for success or failure. 
$(function() {
    


var form = $('#add_points_form');

$(form).submit(function(event) {
   event.preventDefault();
   var formData = $(form).serialize();
   var request = $.ajax({
      type : 'POST',
      url: $(form).attr('action'),
      dataType: "text",
      data: formData
   });
   
   request.done(function(data) {
        if(data == "false") {
            $("#form_container").html("");
            $("#form_container").append("<h1>Points Could Not Be Added</h1>" +
                 "<button class=\"btn btn-default\" onClick=\"window.location.href=\'home.php\'\">Return to the Great Hall</button>" +
                 "<button class=\"btn btn-default\" type=\"submit\" onClick=\"window.location.reload()\">Award More Points</button>");
        }
        
        else if(data == "true") {
            $("#form_container").html("");
            $("#form_container").append("<h1>Points Added Successfully</h1>" +
                 "<button class=\"btn btn-default\" onClick=\"window.location.href=\'home.php\'\">Return to the Great Hall</button>" +
                 "<button class=\"btn btn-default\" onClick=\"window.location.reload()\">Award More Points</button>");
             }
    
   });
   
   
});

});





