<html>
    <?php
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>
<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>    
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    
<style>
    
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
    
    
.select-boxes{width: 280px;text-align: center;}
select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
h6{
    font-size: 14px;
    height: 39px;
    width: 250px;
    
    }

}

</style>
<body class="w3-blue">

<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small" style="height:5%">
    <a href="booking.php" class="w3-bar-item w3-button" ><i class="fa fa-home"></i></a>
  <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a>
  <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
  <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-phone"></i></a>
  <!--<a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>-->
</div>
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
      <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logon.jpg" alt="Girl Hat" style="width:20%" class="w3-padding-16"></a></h1>
    <h6>Welcome to  <span class="w3-tag">BusOn</span></h6>
    
      
  </header>
  
  
  <!-- Image header -->
 

  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">
        
          <h2 style="text-align: center";>Select Your Seat Preference</h2>
          <br>
          <div class="select-boxes">
               </div>
</div>
      

      <?php
 include('dbConfig.php');
    session_start();
      //$columnValues= $_SESSION['seats'];
       $bus_id= $_SESSION['bus_id'];
        $route_id= $_SESSION['route_id'];
         $time= $_SESSION['time'];
         $date= $_SESSION['date'];
          $user_id= $_SESSION['id'];
            
  $querye = $db->query("SELECT seat_no FROM booking WHERE route_id='$route_id' and bus_id='$bus_id' and date='$date' and time='$time'");

$rowCounte = $querye->num_rows;

$columnValues = Array();
if($rowCounte > 0){



while ( $row4 = $querye->fetch_assoc()) {

  $columnValues[] = $row4['seat_no'];

}
//$_SESSION['seats'] = $columnValues;
//echo '<script>window.location="Seat_select.php"</script>';





}
else{
   // $_SESSION['seats'] = $columnValues;
    //echo '<script>window.location="Seat_select.php"</script>';
}


          
          
     
      $query = $db->query("SELECT total_seats FROM bus WHERE bus_id = '$bus_id'");
   
    //Count total number of rows
    $rowCount = $query->num_rows;
    if($rowCount > 0){

 $row = $query->fetch_assoc();
    $n = $row['total_seats'];
    }
     $query7 = $db->query("SELECT operator_id FROM bus WHERE bus_id = '$bus_id'");
       if($query7->num_rows > 0){


 $row7 = $query7->fetch_assoc();
    $n7 = $row7['operator_id'];
    }
    $a=array();

   for ($x = 1; $x <= $n; $x++) {
       if (!in_array($x, $columnValues)){
           array_push($a,$x); 
   } }
     
      ?>
              <div class="login-page">
  <div class="form">
  
    <form class="login-form" >
      <select name="seat" id="seat">
          
  <option selected="selected">Select A Seat Number</option>n
  <?php
            foreach($a as $item){

        ?>

        <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>

        <?php
    } ?>
  
</select> 
     
       
          <input type="submit" class="button" name="select" value="Select Seat" />
          <input type="submit" class="button" name="cancel" value="Cancel " />
           <input type="submit" class="button" name="pay" value="Book Selected Seats" />
           
               <!--<img src="img/bus-seat-numbers.png" alt="Girl in a jacket" width="700" height="300" style="position: absolute; top:auto; right:100 ;">--> 
           </form>
  </div>
</div>
    </div>

          
            
      </div>
      
    </div>

  </div>

</div>


</body>
<?php
//$seats = array();

include('dbConfig.php');

if($_GET){
  
    if(isset($_GET['pay']) ){
        
        if(!empty($_GET['perl'])){
           echo "sff";  
        }
        if(!empty($_SESSION['seats'])){
         foreach($_SESSION['seats'] as $so){
      // $_SESSION['seats']
        
        
      $seat_id= ($so);
     $query1 = $db->query("INSERT INTO booking (date,time,route_id,bus_id,payment_status,seat_no,customer_id,operator_id )VALUES( '$date', '$time','$route_id','$bus_id','None','$seat_id','$user_id','$n7' )");
         }// $a = array_diff($a, array($seat_id));
     if($query1) {?> <h1> <?php  
     
     echo '<script>window.location="Check.php"</script>'  ?> </h1> 
     <?php
    }
    else{
        echo "Select A Seat Number First";
    }
    }
 else {
        echo "Select A Seat First";
    }
    }
    
}
 //$seats = array();
if($_GET){
   
     
    
    if(isset($_GET['select']) ){
        $seat_id= ($_GET['seat']);
       if((!in_array($seat_id, $_SESSION['seats']))){
       array_push($_SESSION['seats'],$seat_id); 
       }
       else{
           echo "You Have Already Selected The Seat";
       }
//       $seats =$_SESSION['seats'] ;
       echo "Selected Seats";
        foreach($_SESSION['seats'] as $so){
        echo " ";  
        echo $so;
        
        }
       
       // echo '<script>window.location="Check.php"</script>';
    }
    }
    if($_GET){
       
    
    
    
    if(isset($_GET['cancel']) ){
        $_SESSION['seats']=array();
//        unset($_SESSION['seats']);
//        
//        echo $_SESSION['seats'][0];
//       // $seat_id= ($_GET['seat']);
       
      // array_push($seats,$seat_id); 
       
       //$_SESSION['seats'] = $seats;
       // foreach($seats as $so){
            
        //echo $so;
        
       // }
       
       // echo '<script>window.location="Check.php"</script>';
    }
    }
?>

</html>