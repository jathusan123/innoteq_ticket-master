<html>
<?php
include('dbConfig.php');
session_start();
$user_id=$_SESSION['id'];
$bus_id=$_SESSION['bus_id'];
$route_id= $_SESSION['route_id'];
$station_id=$_SESSION['station_id'];
$date=$_SESSION['date'];
$time=$_SESSION['time'];
$n7=$_SESSION['operator_id'];
$start_place=$_SESSION['start_place']; 
$destination=$_SESSION['destination'];
    $myString = $_COOKIE["cam"];
$myArray = explode(',', $myString);
$seat_al2=array('1_1','1_2','1_4','1_5','2_1','2_2','2_4','2_5','3_1','3_2','3_4','3_5','4_1','4_2','4_4','4_5','5_1','5_2','5_4','5_5','6_1','6_2','6_4','6_5','7_1','7_2','7_4','7_5','8_1','8_2','8_4','8_5','9_1','9_2','9_4','9_5','10_1','10_2','10_4','10_5','11_1','11_2','11_4','11_5','12_1','12_2','12_3','12_4','12_5');
  
   $d=array();
foreach ($myArray as $pal){
    $key = array_search($pal, $seat_al2)+1;
    //$d2=$seat_al2[$key];
array_push($d, $key);}
   foreach($d as $so){
      // $_SESSION['seats']
        
        
      $seat_id= ($so);
     $query1 = $db->query("INSERT INTO booking (date,time,route_id,bus_id,payment_status,seat_no,customer_id,operator_id,arrive_place,depart_place )VALUES( '$date', '$time','$route_id','$bus_id','None','$seat_id','$user_id','$n7','$start_place','$destination' )");
         }// $a = array_diff($a,

if($_GET){
  
    if(isset($_GET['later']) ){
        echo '<script>window.location="customer.php"</script>';
    }
}
$seats=$d;
$query9 = $db->query("SELECT * FROM customer WHERE customer_id='$user_id'");
    $rowCount9 = $query9->num_rows;
    if($rowCount9>0){
    $row9 = $query9->fetch_assoc();
    }
 $query19 = $db->query("SELECT * FROM bus WHERE bus_id='$bus_id'");
  $rowCount19 = $query19->num_rows;
  if($rowCount19>0){
  $row19 = $query19->fetch_assoc();}
       foreach($seats as $so){
            
        
        
        }
 $query24 = $db->query("SELECT amount FROM intermediate_station WHERE station_id='$station_id'");
  $rowCount24 = $query19->num_rows;
  if($rowCount24>0){
  $row24 = $query24->fetch_assoc();}
       $t_amount=0; 
       (string)$t_seats="";
     foreach($seats as $so){
           
       $t_amount= $t_amount+$row24['amount'];
        $t_seats= $t_seats+" "+(string)$so;
       }
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
    font-size: 14px;}
/*h6{
    font-size: 14px;
    height: 39px;
    width: 250px;
    
    }*/
input{  
   font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 350px;
    outline: none;
    margin: 10px 0 10px 0;}

button{  
   font-family: Georgia;
    font-weight: bold;
    font-size: 10px;
    height: 30px;
    padding: 7px 8px;
    width: 100px;
    outline: none;
    margin: 10px 0 10px 0;}
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
      <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logon.jpg" alt="Girl Hat" style="width:10%" class="w3-padding-16"></a></h1>
    <h6>Welcome to  <span class="w3-tag">BusOn</span></h6>
    
      
  </header>
  
  
  <!-- Image header -->
 

  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">
        
          <h2 style="text-align: center";>Your Booking Information</h2>
          <br>
          <div class="select-boxes">
               </div>
</div>
      
<form >
    <input id="token" name="token" type="hidden" value="">
    <div>
        <label>
            <span style= "font-size: 18px;">User Name :</span>
        </label>
<?php echo $row9['name']; ?>        
<!--<input id="ccNo" type="text" size="20" value="" autocomplete="off" required />-->
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;">E-Mail :</span>
        </label>
        <?php echo $row9['email']; ?>
        <!--<input type="text" size="2" id="expMonth" required />-->
        <span> </span>
        <!--<input type="text" size="2" id="expYear" required />-->
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;"> Phone Number :</span>
        </label>
        <?php echo $row9['ph_number']; ?>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;"> Bus Name :</span>
        </label>
        <?php echo $row19['name']; ?>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;"> Seat No: </span>
        </label>
        <?php foreach($seats as $so){
           echo "  ";
           echo $so;
       } ?>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;"> Type : </span>
             <?php echo $row19['type']; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
     <div>
        <label>
            <span style= "font-size: 18px;"> Total Amount : </span>
             <?php echo $t_amount; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
     <div>
        <label>
            <span style= "font-size: 18px;"> Date : </span>
             <?php echo $date; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
     <div>
        <label>
            <span style= "font-size: 18px;"> Time : </span>
             <?php echo $time; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
      <div>
        <label>
            <span style= "font-size: 18px;"> Departure Place : </span>
             <?php echo $start_place; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
      <div>
        <label>
            <span style= "font-size: 18px;"> Destination : </span>
             <?php echo $destination; ?>
        </label>
        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
    <input type="submit" name="credit" value="Proceed To Online Payment" style=" font-family: Georgia;
   
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;">
    <input type="submit" name="later" value="Pay Later" style=" font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;">

</form>
<?php
if($_GET){
    if($_GET['later']){
         echo '<script>window.location="customer.php"</script>';
    }
    if($_GET['credit']){
         echo '<script>window.location="Credit.php"</script>';
    }
}
?>