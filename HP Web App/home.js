//Lawson Kennan
//CS 4640 Project

//Javascript for handling all the stuff on the home page. There's a decent amount because there are four cases, one for each house. 

//Initial requests to get point values for Houses. Subsequent requests are on an interval.
   var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Gryffindor"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#gryff_points").html("");
      $("#gryff_points").append("<h3>Point Total: " + data + "</h3>");
   });

//Initial point request for Hufflepuffs
    request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Hufflepuff"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#hufflepuff_points").html("");
      $("#hufflepuff_points").append("<h3>Point Total: " + data + "</h3>");
   });


//Initial request for Ravenclaw
   request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Ravenclaw"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#ravenclaw_points").html("");
      $("#ravenclaw_points").append("<h3>Point Total: " + data + "</h3>");
   });

   
   //Initial request for Slytherin
   request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Slytherin"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#slytherin_points").html("");
      $("#slytherin_points").append("<h3>Point Total: " + data + "</h3>");
   });



//Click event for logout button. Calls controller, sets cookie, and returns to the login.html page.
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


//Redirects to add_points page on click.
$("#add_points").click(function(evt) {
   evt.preventDefault();
   document.location = 'add_points.php';
});


//Interval functions for continually updating the point values 
setInterval(function() {
      var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Gryffindor"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#gryff_points").html("");
      $("#gryff_points").append("<h3>Point Total: " + data + "</h3>");
   });
   },10000);

//Interval request for Hufflepuff.
setInterval(function() {
      var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Hufflepuff"},
      cache : "false"
   },10000);
   
   request.done(function(data) {
      $("#hufflepuff_points").html("");
      $("#hufflepuff_points").append("<h3>Point Total: " + data + "</h3>");
   });
   },10000);

//Interval request for Ravenclaw.
setInterval(function() {
      var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Ravenclaw"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#ravenclaw_points").html("");
      $("#ravenclaw_points").append("<h3>Point Total: " + data + "</h3>");
   });
   },10000);

//Interval request for Slytherin
setInterval(function() {
      var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {house:"Slytherin"},
      cache : "false"
   });
   
   request.done(function(data) {
      $("#slytherin_points").html("");
      $("#slytherin_points").append("<h3>Point Total: " + data + "</h3>");
   });
   },10000);

//Calls controller to get DB informaiton and displays it in a cool way.
$("#gryffindor_stats").click(function(evt) {
   evt.preventDefault();
   $("#houses").html("");
   $("#houses").append("<h1>Gryffindor</h1><h2>Head of House: Minerva McGonagall</h2><p><button class=\"btn btn-default\" onClick=\"window.location.reload()\">Return to the Great Hall</button></p> ");
   
   var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {show_table:"Gryffindor"},
      cache : 'false'
   });
   
   request.success(function(data) {
      $("#houses").css("background-color","rgb(235,10,10)");
      $("#houses").css("border-color","rgb(255,217,0)");
      $("#houses").append(data);
      var request1 = $.ajax({
         type : "POST",
         url : "HomeController.php",
         dataType: "json",
         data : {show_graph:"Gryffindor"},
         cache : 'false'
       });
   
      request1.success(function(output) {
       
       var labels = ["0"];
       
       for(var i = 1; i<output.length; i++) {
         output[i] = parseInt(output[i]) + parseInt(output[i-1]);
         labels.push(i.toString());
       }
       
       $("#houses").append("<canvas id=\"myChart\"></canvas>");
       $("#myChart").css("background-color","rgb(240,240,240)");
       var ctx = document.getElementById("myChart").getContext('2d');
       var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: "Gryffindor House Points",
            backgroundColor: 'rgb(200, 0, 0)',
            borderColor: 'rgb(255, 217, 0)',
            data: output,
        }]
    },

    // Configuration options go here
    options: {}
});
   });
      request1.fail(function() {
         $("#houses").append("<p>Failure</p>");
      });
      
   });
});

//Button click that shows table data for points awards, as well as a graphical representation of the point total over time. 
$("#hufflepuff_stats").click(function(evt) {
   evt.preventDefault();
   $("#houses").html("");
   $("#houses").append("<h1>Hufflepuff</h1><h2>Head of House: Pomona Sprout</h2><button class=\"btn btn-default\" onClick=\"window.location.reload()\">Return to the Great Hall</button> ");
     var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {show_table:"Hufflepuff"},
      cache : 'false'
   });
   
   request.done(function(data) {
      $("#houses").css("background-color","rgb(230,184,0)");
      $("#houses").css("border-color","rgb(10,10,10)");
      $("#houses").append(data);
       var request1 = $.ajax({
         type : "POST",
         url : "HomeController.php",
         dataType: "json",
         data : {show_graph:"Hufflepuff"},
         cache : 'false'
       });
   
      request1.success(function(output) {
       
       var labels = ["0"];
       
       for(var i = 1; i<output.length; i++) {
         output[i] = parseInt(output[i]) + parseInt(output[i-1]);
         labels.push(i.toString());
       }
      
       $("#houses").append("<canvas id=\"myChart\"></canvas>");
       $("#myChart").css("background-color","rgb(240,240,240)");
       $("#myChart").css("margin","10px");
       var ctx = document.getElementById("myChart").getContext('2d');
       var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: "Hufflepuff House Points",
            backgroundColor: 'rgb(230, 184, 0)',
            borderColor: 'rgb(10, 10, 10)',
            data: output,
        }]
    },

    // Configuration options go here
    options: {}
});
   });
      request1.fail(function() {
         $("#houses").append("<p>Failure</p>");
      });
   });
    
});

//Button click that shows table data for points awards, as well as a graphical representation of the point total over time. 
$("#ravenclaw_stats").click(function(evt) {
   evt.preventDefault();
   $("#houses").html("");
   $("#houses").append("<h1>Ravenclaw</h1><h2>Head of House: Filius Flitwick</h2><button class=\"btn btn-default\" onClick=\"window.location.reload()\">Return to the Great Hall</button> ");
     var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {show_table:"Ravenclaw"},
      cache : 'false'
   });
   
   request.done(function(data) {
      $("#houses").css("background-color","rgb(70,70,255)");
      $("#houses").css("border-color","rgb(204,82,0)");
      $("#houses").append(data);
       var request1 = $.ajax({
         type : "POST",
         url : "HomeController.php",
         dataType: "json",
         data : {show_graph:"Ravenclaw"},
         cache : 'false'
       });
   
      request1.success(function(output) {
       
       var labels = ["0"];
       
       for(var i = 1; i<output.length; i++) {
         output[i] = parseInt(output[i]) + parseInt(output[i-1]);
         labels.push(i.toString());
       }
       $("#houses").append("<canvas id=\"myChart\"></canvas>");
       $("#myChart").css("background-color","rgb(240,240,240)");
       var ctx = document.getElementById("myChart").getContext('2d');
       var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: "Ravenclaw House Points",
            backgroundColor: 'rgb(35, 35, 255)',
            borderColor: 'rgb(204, 82, 0)',
            data: output,
        }]
    },

    // Configuration options go here
    options: {}
});
   });
      request1.fail(function() {
         $("#houses").append("<p>Failure</p>");
      });
   });

});

//Button click that shows table data for points awards, as well as a graphical representation of the point total over time. 
$("#slytherin_stats").click(function(evt) {
   evt.preventDefault();
   $("#houses").html("");
   $("#houses").append("<h1>Slytherin</h1><h2>Head of House: Severus Snape</h2><button class=\"btn btn-default\" onClick=\"window.location.reload()\">Return to the Great Hall</button> ");
     var request = $.ajax({
      type : "POST",
      url : "HomeController.php",
      dataType: "text",
      data : {show_table:"Slytherin"},
      cache : 'false'
   });
   
   request.done(function(data) {
      $("#houses").css("background-color","rgb(40,155,40)");
      $("#houses").css("border-color","rgb(192,192,192)");
      $("#houses").append(data);
       var request1 = $.ajax({
         type : "POST",
         url : "HomeController.php",
         dataType: "json",
         data : {show_graph:"Slytherin"},
         cache : 'false'
       });
   
      request1.success(function(output) {
       
       var labels = ["0"];
       
       for(var i = 1; i<output.length; i++) {
         output[i] = parseInt(output[i]) + parseInt(output[i-1]);
         labels.push(i.toString());
       }
       $("#houses").append("<canvas id=\"myChart\"></canvas>");
       $("#myChart").css("background-color","rgb(240,240,240)");
       var ctx = document.getElementById("myChart").getContext('2d');
       var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: "Slytherin House Points",
            backgroundColor: 'rgb(10, 150, 10)',
            borderColor: 'rgb(192, 192, 192)',
            data: output,
        }]
    },

    // Configuration options go here
    options: {}
});
   });
      request1.fail(function() {
         $("#houses").append("<p>Failure</p>");
      });
   });
    
});

