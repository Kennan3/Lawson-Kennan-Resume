<?php
    require_once("PointsModel.php");
    
    class PointsView {
        private $model;
        
        //Constructor function that creates an instance of the model
        function __construct() {
            $this->model = new PointsModel();
        }
        
        
        public function show_house_log($house) {
            $result = $this->model->get_all_records($house);
            $value = "";
            $value = $value . "<table class=\"table\" id=\"tab1\"> <thead><tr><th id=\"id\">Award ID</th><th id=\"house\">House</th><th id=\"value\">Value</th><th id=\"reason\">Reason</th><th id=\"professor\">Professor</th><th id=\"date\">Date</th></tr></thead><tbody>";
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                 $value = $value . "<tr><td><strong>" . $row['award_id'] . "</strong></td><td><strong>" . $row['house'] . "</strong></td><td><strong>" . $row['value'] . "</strong></td><td><strong>" . $row['reason'] . "</strong></td><td><strong>" . $row['professor'] . "</strong></td><td><strong>" . $row['date'] . "</strong></td></tr>";
            }
            
            $value = $value . "</tbody></table>";
            return $value;
        }
        
        public function show_points_array($house) {
            $result = $this->model->get_points_array($house);
            $array = array();
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                array_push($array,$row['value']);
            }
            return json_encode($array);
            
        }
        
        
    }


?>