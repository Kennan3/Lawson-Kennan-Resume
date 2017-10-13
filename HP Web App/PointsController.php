<?php
//Lawson Kennan
require_once("PointsView.php");

//Controller for points submission. Two cases. Gets the values from the POST form and makes the necessary function call.
//Checks if form input is valid. Returns false if invald, returns true if request handled.


    $house = $_POST['house'];
    $value = $_POST['value'];
    $professor = "Professor " . $_COOKIE['last'];
    $reason = $_POST['reason'];
    
    if(!intval($value) || intval($value) > 200 || intval($value) < -200) {
        echo "false";
     } else {
        $model = new PointsModel();
        $model->add_record($house,$value,$professor,$reason);
        echo "true";
    }



?>