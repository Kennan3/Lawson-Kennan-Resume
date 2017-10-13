<?php
require_once("PointsView.php");


    //Log user out. Javascript handles the page redirect to the login page. 
    if(isset($_POST['logout']) && $_POST['logout'] == 'true') {
        setcookie('loggedIn',false);
    } 
    
 
    //If certain post variable is set, return the total points for Gryffindor. This is the value displayed on the banner.
    if(isset($_POST['house']) && $_POST['house'] == 'Gryffindor') {
        $model = new PointsModel();
        $total = $model->get_total_points('Gryffindor');
        echo $total;
        
    }
    //If certain post variable is set, return the total points for Hufflepuff. This is the value displayed on the banner.
    if(isset($_POST['house']) && $_POST['house'] == 'Hufflepuff') {
        $model = new PointsModel();
        $total = $model->get_total_points('Hufflepuff');
        echo $total;
        
    }
    //If certain post variable is set, return the total points for Ravenclaw. This is the value displayed on the banner.
    if(isset($_POST['house']) && $_POST['house'] == 'Ravenclaw') {
        $model = new PointsModel();
        $total = $model->get_total_points('Ravenclaw');
        echo $total;
        
    }
    
    //If certain post variable is set, return the total points for Slytherin. This is the value displayed on the banner.
   if(isset($_POST['house']) && $_POST['house'] == 'Slytherin') {
        $model = new PointsModel();
        $total = $model->get_total_points('Slytherin');
        echo $total;
        
    }
    
    //Handles getting the necessary data for the Gryffindor points table.
    if(isset($_POST['show_table']) && $_POST['show_table'] == 'Gryffindor') {
        $view = new PointsView();
        $table = $view->show_house_log('Gryffindor');
        echo $table;
    }
     //Handles getting the necessary data for the Hufflepuff points table.
    if(isset($_POST['show_table']) && $_POST['show_table'] == 'Hufflepuff') {
        $view = new PointsView();
        $table = $view->show_house_log('Hufflepuff');
        echo $table;
    }
    //Handles getting the necessary data for the Ravenclaw points table.
    if(isset($_POST['show_table']) && $_POST['show_table'] == 'Ravenclaw') {
        $view = new PointsView();
        $table = $view->show_house_log('Ravenclaw');
        echo $table;
    }
     //Handles getting the necessary data for the Slytherin points table.
    if(isset($_POST['show_table']) && $_POST['show_table'] == 'Slytherin') {
        $view = new PointsView();
        $table = $view->show_house_log('Slytherin');
        echo $table;
    }
    
     //Handles getting the necessary data for the Gryffindor graph.
    if(isset($_POST['show_graph']) && $_POST['show_graph'] == 'Gryffindor') {
        $view = new PointsView();
        $result = $view->show_points_array("Gryffindor");
        echo $result;
    }
    
    //Handles getting the necessary data for the Hufflepuff graph.
      if(isset($_POST['show_graph']) && $_POST['show_graph'] == 'Hufflepuff') {
        $view = new PointsView();
        $result = $view->show_points_array("Hufflepuff");
        echo $result;
    }
    
    //Handles getting the necessary data for the Ravenclaw graph.
      if(isset($_POST['show_graph']) && $_POST['show_graph'] == 'Ravenclaw') {
        $view = new PointsView();
        $result = $view->show_points_array("Ravenclaw");
        echo $result;
    }
    
    //Handles getting the necessary data for the Slytherin graph.
      if(isset($_POST['show_graph']) && $_POST['show_graph'] == 'Slytherin') {
        $view = new PointsView();
        $result = $view->show_points_array("Slytherin");
        echo $result;
    }

    

?>