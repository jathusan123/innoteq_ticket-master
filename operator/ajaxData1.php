<?php
static $t;
//Include database configuration file
include('dbConfig.php');
session_start();

//$t=($_POST["country_id"]);
//$_SESSION["route_id"] = $t;
//global $t;
if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    //    $query1 = $db->query("SELECT start_place FROM route WHERE route_id = ".$_POST['country_id']."");
      //  static $t;
        //$rowCount1 = $query->num_rows;
        //$row1 = $query1->fetch_assoc();
    $t=($_POST["country_id"]);
    //global $t;
 
    $query = $db->query("SELECT time_slots,time_slots from bus_timeslot WHERE bus_id='$t'");
    //$de = ".$_POST['country_id'].";
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
       // <h> 'dggdf' </h>
        echo '<option value=""> Select Destination </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['time_slots'].'">'.$row['time_slots'].'</option>';
        }
    }else{
        echo '<option value=""> </option>';
    }
}


?>