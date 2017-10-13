<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home Page</title>

    <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
        
        h1 {
            text-align: center;
        }
        
        
          <?php
          $color = '#fff';
          $border = '#fff';
          if($_COOKIE['house'] == "Gryffindor") {$color = '#c80000'; $border = '#ffd900';}
          if($_COOKIE['house'] == "Hufflepuff") {$color = '#e6b800'; $border = '#010101';}
          if($_COOKIE['house'] == "Ravenclaw") {$color = '#1a1aff'; $border = '#cc5200';}
          if($_COOKIE['house'] == "Slytherin") {$color = '#22aa33'; $border = '#c0c0c0';}
        
        ?>
        
         #user_info {
          position: absolute;
          right:0px;
          top:0px;
          z-index: 1000;
          margin:3px;
          background-color: <?php echo $color; ?>;
          border: solid;
          border-width: 2px;
          border-color: <?php echo $border; ?>;
          width:175px;
          height: 130px;
          border-radius:10px;
          
        }
        
        #user_info p {
          text-align: center;
          font-size: 20px;
        }
        
        #form_container {
            position: relative;
            top: 50px;
            padding-bottom: 10px;
            border-radius: 5px;
            background-color: rgb(230,230,230);
        }
        
        <?php
          if($_COOKIE['userType'] == 'Student') {
        ?>
          body {
            background-image: url("restricted_bg.png");
            background-size: 100%;
          }
          
         #restricted {
            position: relative;
            top: 50px;
            background-color: rgb(230,230,230);
            border-radius: 3px;
            text-align: center;
            padding: 10px;
        }
          
          <?php
          } else {
          ?>
          
           body {
            background-image: url("home_background.jpg");
            background-size: 100%;
          }
          
          <?php } ?>
        
     
      
    </style>
    
    
    
  </head>
  <body>
    
    
    <div class="container" id="user_info">
      
      <p>
         <?php
          echo $_COOKIE['username'];
          echo "<br>";
          echo $_COOKIE['house'];
          echo "<br>";
          echo $_COOKIE['userType'];
          ?>
          
          <button class="btn btn-default" type="submit" id="logout">Logout</button>
      </p>
      
    </div>
    
    <?php
        if($_COOKIE['userType'] != 'Professor') { ?>
          <div class="container" id="restricted">
            <h2>This is the restricted section! Please return to the Great Hall.</h2>
            <button class="btn btn-default" type="submit" id="return_home">Return to the Great Hall</button>
          </div>
        <?php
         }  else {
          ?>  
        
        
        
        
        <div class = "container" id="form_container">
        <h1>Welcome, <?php echo $_COOKIE['username'];?>. Award Points Below.</h1> 
        <p>Maximum value for awarding points is 200. Please consult Headmaster Dumbledore if you have issues.</p>
        <form action="PointsController.php" method="POST" id="add_points_form">
            <label for="house">House <select id=\"house\" name="house"><option value="Gryffindor">Gryffindor</option><option value="Hufflepuff">Hufflepuff</option><option value="Ravenclaw">Ravenclaw</option><option value="Slytherin">Slytherin</option></select></label><br>
            <label for="value">Value<input type="text" id="value" name="value"/></label><br>
            <label for="reason">Reason<input type="text" id="reason" name="reason"/></label><br>
            <button class="btn btn-default" type="submit" id="submit_points" name="cmd" value="Award Points">Award Points</button>
        </form>
        </div>
    <?php
        }
    ?>
    
  
    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script src="add_points.js"></script>
    
    
  </body>
</html>