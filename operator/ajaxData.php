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
    $query9 = $db->query("SELECT start_place FROM intermediate_station WHERE station_id = '$t'");
    $rowCount1 = $query9->num_rows;
    if($rowCount1>0){
    $row9 = $query9->fetch_assoc();
    $d9=$row9["start_place"];}
    else{$d="167";}
    $query = $db->query("SELECT inter_station,station_id FROM intermediate_station WHERE start_place = '$d9' GROUP BY inter_station");
    //$de = ".$_POST['country_id'].";
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
       // <h> 'dggdf' </h>
        echo '<option value=""> Select Destination </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['station_id'].'">'.$row['inter_station'].'</option>';
        }
    }else{
        echo '<option value=""> </option>';
    }
}


if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all state data
    //    $query1 = $db->query("SELECT start_place FROM route WHERE route_id = ".$_POST['country_id']."");
      //  static $t;
        //$rowCount1 = $query->num_rows;
        //$row1 = $query1->fetch_assoc();
    $t1=($_POST["state_id"]);
    //global $t;
    $query1 = $db->query("SELECT inter_station FROM intermediate_station WHERE station_id = '$t1'");
    $rowCount1 = $query1->num_rows;
    if($rowCount1>0){
    $row1 = $query1->fetch_assoc();
    $d=$row1["inter_station"];}
    else{$d="167";}
     $query10 = $db->query("SELECT start_place FROM intermediate_station WHERE station_id = '$t1'");
    $rowCount10 = $query10->num_rows;
    if($rowCount10>0){
    $row10 = $query10->fetch_assoc();
    $d10=$row10["start_place"];}
    else{$d10="167";}
    
    $query = $db->query("SELECT distinct route_id,station_id FROM intermediate_station WHERE inter_station = '$d' and start_place='$d10'");
    
    //$de = ".$_POST['country_id'].";
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
       // <h> 'dggdf' </h>
        echo '<option value=""> Select Route </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['station_id'].'">'.$row['route_id'].'</option>';
        }
    }else{
        echo '<option value=""> </option>';
    }
}

if(isset($_POST["route_id"]) && !empty($_POST["route_id"])){
    //Get all state data
    //    $query1 = $db->query("SELECT start_place FROM route WHERE route_id = ".$_POST['country_id']."");
      //  static $t;
        //$rowCount1 = $query->num_rows;
        //$row1 = $query1->fetch_assoc();
    $t=($_POST["route_id"]);
    //global $t;
    $query1 = $db->query("SELECT route_id FROM intermediate_station WHERE station_id = '$t'");
    $rowCount1 = $query1->num_rows;
    if($rowCount1>0){
    $row1 = $query1->fetch_assoc();
    $d=$row1["route_id"];}
    else{$d="167";}
  $query = $db->query("SELECT bus_id,name FROM bus WHERE route_id = '$d'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Bus</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['bus_id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Bus not available</option>';
    }
}
//if(isset($_POST["route_id"]) && !empty($_POST["route_id"])){
//    //Get all city data
//    $query = $db->query("SELECT bus_id,bus_name FROM bus WHERE route_id = ".($_POST["state_id"])."");
//    
//    //Count total number of rows
//    $rowCount = $query->num_rows;
//    
//    //Display cities list
//    if($rowCount > 0){
//        echo '<option value="">Select Bus</option>';
//        while($row = $query->fetch_assoc()){ 
//            echo '<option value="'.$row['bus_id'].'">'.$row['bus_name'].'</option>';
//        }
//    }else{
//        echo '<option value="">date not available</option>';
//    }
//}
if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){
    //Get all city data
    $r=($_POST["city_id"]);
    
    //echo '<script>window.location="PatientSelect.php"</script>';
    $query = $db->query("SELECT bus_id,type FROM bus WHERE bus_id = ".$_POST['city_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Type</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['bus_id'].'">'.$row['type'].'</option>';
        }
    }else{
        echo '<option value=""> Type Not Available </option>';
    }
}

if(isset($_POST["type_id"]) && !empty($_POST["type_id"])){
    //Get all city data
    $r=($_POST["type_id"]);
    
    //echo '<script>window.location="PatientSelect.php"</script>';
   // $query33 = $db->query("SELECT date from availability WHERE bus_id=".$_POST['type_id']." ");
    
    $query = $db->query("SELECT date,date_id from date WHERE bus_id= ".$_POST['type_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Date</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['date_id'].'">'.$row['date'].'</option>';
        }
    }else{
        echo '<option value=""> Time Slot Not Available</option>';
    }
}
if(isset($_POST["date_id"]) && !empty($_POST["date_id"])){
    //Get all city data
    $r=($_POST["date_id"]);
    
    //echo '<script>window.location="PatientSelect.php"</script>';
   // $query33 = $db->query("SELECT date from availability WHERE bus_id=".$_POST['type_id']." ");
    
    $query = $db->query("SELECT date,bus_id from date WHERE date_id= ".$_POST['date_id']."");
    
    
    //Count total number of rows
    $rowCount = $query->num_rows;
     if($rowCount > 0){
      //  echo '<option value="">Select Type</option>';
        while($row = $query->fetch_assoc()){ 
            $bus_id22=$row['bus_id'];
            $bus_date=$row['date'];
            //echo '<option value="'.$row['bus_id'].'">'.$row['date'].'</option>';
     }}
     $query2 = $db->query("SELECT time from availability WHERE date='$bus_date' AND bus_id='$bus_id22'");
     $rowCount2 = $query2->num_rows;
     if($rowCount2 > 0){
      //  echo '<option value="">Select Type</option>';
         $columnValues = Array();
        while($row2 = $query2->fetch_assoc()){ 
            $columnValues[] = $row2['time'];
            //echo '<option value="'.$row['bus_id'].'">'.$row['date'].'</option>';
     }}
    $query3 = $db->query("SELECT time_slots,time_slots from bus_timeslot WHERE bus_id='$bus_id22'");
    $rowCount3 = $query3->num_rows;
    //Display cities list
    if($rowCount3 > 0){
        echo '<option value="">Select Time</option>';
        while($row3 = $query3->fetch_assoc()){ 
        if(!in_array($row3['time_slots'], $columnValues)) {
            echo '<option value="'.$row3['time_slots'].'">'.$row3['time_slots'].'</option>';
        }}
    }else{
        echo '<option value=""> Time Slot Not Available</option>';
    }
}

?>