
<?php
  if(!isset($_COOKIE['loggedIn'])) {
    header("Location:login.html");
  }

?>

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
        
        h1, h2 {
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
        
        body {
          background-image: url("home_background.jpg");
          background-size: 100%;
        }
        
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
        
        #houses {
          border: solid;
          border-width:2px;
          border-color: transparent;
          align-content: center;
          border-radius:2px;
          
        }
        
        #gryffindor, #hufflepuff, #ravenclaw, #slytherin {
          height:500px;
          width: 270px;
          float: left;
          margin:10px;
          border-radius: 3px;
        }
        
        #gryffindor {
          position: relative;
          background-image: url("gryff_crest.png");
          background-size: 270px 500px;
          text-align: center;
          
        }
        

        
        #hufflepuff {
          position: relative;
          background-image: url("hufflepuff_crest.png");
          background-size: 270px 500px;
          text-align: center;
          
        }
        
        #ravenclaw {
          position: relative;
          background-image: url("ravenclaw_crest.png");
          background-size: 270px 500px;
          text-align: center;
        }
        
        #slytherin {
          position: relative;
          background-image: url("slytherin_crest.png");
          background-size: 270px 500px;
          text-align: center;
        }
        
        
        #gryffindor_stats, #hufflepuff_stats, #ravenclaw_stats, #slytherin_stats {
             
            
          
        }
        
        #nav {
          padding: 20px;
          text-align:center;
        }
        
        #add_points {
          padding: 20px;
        }
        
        #header {
          margin-top: 15px;
          padding: 4px;
          margin-left: auto;
          margin-right:auto;
          
          background-color: rgb(210,210,210);
          width:400px;
          border-radius:5px;
          
        }
        
        .points_container {
          background-color: rgb(210,210,210);
          border-radius: 5px;
        }
      
    </style>
    
    
    
  </head>
  <body>
    <div id="header">
    <h1>The Great Hall</h1>
    </div>
    <div class="container" id="user_info">
      <p><strong>
         <?php
          echo $_COOKIE['username'];
          echo "<br>";
          echo $_COOKIE['house'];
          echo "<br>";
          echo $_COOKIE['userType'];
          ?>
          </strong>
          <button class="btn btn-default" type="submit" id="logout">Logout</button>
      </p>
      
    </div>
    
    <!--Container for house information -->
    
    
    <div class="row">
    
    <div class="col-md-1"></div>
    
    <div class="col-md-10" id="houses">
      
      
    
    <div id="gryffindor">
      <div class="points_container">
      <p id="gryff_points"></p>
      </div>
      
      <button class="btn btn-default" type="submit" id="gryffindor_stats">Gryffindor Stats</button>
      
    </div>
    
    <div id="hufflepuff">
      <div class="points_container">
      <p id="hufflepuff_points"></p>
      </div>
      <button class="btn btn-default" type="submit" id="hufflepuff_stats">Hufflepuff Stats</button>
    </div>
        
    <div id="ravenclaw">
      <div class="points_container">
      <p id="ravenclaw_points"></p>
      </div>
      <button class="btn btn-default" type="submit" id="ravenclaw_stats">Ravenclaw Stats</button>
    </div>
      
    <div id="slytherin">
      <div class="points_container">
      <p id="slytherin_points"></p>
      </div>
      <button class="btn btn-default" type="submit" id="slytherin_stats">Slytherin Stats</button>
    </div>
    
    </div>
    <div class="col-md-1"></div>
    
    
    <!--Row-->
    </div>
    <!--End container for house information/banners -->
    
    <div class="row">
    <p id="nav">
       <button class="btn btn-default" type="submit" id="add_points">Award House Points</button>
    </p>
    </div>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="home.js"></script>
    
    
    
    
    
    
    
    
  </body>
</html>