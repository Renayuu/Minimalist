<?php

class GoalHandler{
    function get() {
    	$items = getData();
    	include "goals.php";


        // include "views/closet.php";
   
    }

    function post_xhr() {
       // $newGoal = updateGoalSQL();
       // echo json_encode($newGoal);
    }

}

?>
