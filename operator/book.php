<!DOCTYPE html>
<html>
    <?php
    include('dbConfig.php');
     session_start();
     
     $date = date('Y-m-d'); //today date
$weekOfdays = array();
$date = new DateTime($date);

for($i=1; $i <= 5; $i++){
    $date->modify('+1 day');
    $weekOfdays[] = $date->format('Y-m-d');
}
$query12= $db->query("TRUNCATE TABLE date");
$query = $db->query("SELECT DISTINCT bus_id from bus ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        
        
        while($row = $query->fetch_assoc()){
            $ide=$row['bus_id'];
           
            foreach ($weekOfdays as $value){
            $query11 = $db->query("INSERT INTO date (date,bus_id) VALUES( '$value','$ide')");}
        }
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
<link href="css/bootstrap.min_1.css" rel="stylesheet">
	<link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style_2.css" rel="stylesheet">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
      <link rel="stylesheet" href="cs.css">
    <script src="st.js"></script>
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
}

</style>
    <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#route').html('<option value="">Select Destination first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Starting Place first</option>');
            $('#route').html('<option value="">Select Destination first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#route').html(html);
                }
            }); 
        }else{
            $('#route').html('<option value="">Select Destiantion first</option>'); 
        }
    });
         $('#route').on('change',function(){
        var routeID = $(this).val();
        if(routeID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'route_id='+routeID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select bus first</option>'); 
        }
    });
    $('#city').on('change',function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#type').html(html);
                }
            }); 
        }else{
            $('#type').html('<option value="">Select Date first</option>'); 
        }
    });
     $('#type').on('change',function(){
        var typeID = $(this).val();
        if(typeID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'type_id='+typeID,
                success:function(html){
                    $('#date').html(html);
                }
            }); 
        }else{
            $('#date').html('<option value="">Select bus first</option>'); 
        }
    });
        $('#date').on('change',function(){
        var dateID = $(this).val();
        if(dateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'date_id='+dateID,
                success:function(html){
                    $('#time').html(html);
                }
            }); 
        }else{
            $('#time').html('<option value="">Select bus first</option>'); 
        }
    });
//    $('#time').on('change',function(){
//        var timeID = $(this).val();
//        if(timeID){
//            $.ajax({
//                type:'POST',
//                url:'ajaxData.php',
//                data:'time_id='+typeID,
//                success:function(html){
//                    $('#date').html(html);
//                }
//            }); 
//        }else{
//            $('#date').html('<option value="">Select type first</option>'); 
//        }
//    });
 
    
});
</script>
      
    
<body class="w3-white">

<!-- Navigation bar with social media icons -->
<!--<div class="w3-bar w3-black w3-hide-small">
  <a href="https://www.facebook.com/lisenme/" class="w3-bar-item w3-button" ><i class="fa fa-home"></i></a>
  <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a>
  <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
  <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-phone"></i></a>
</div>
  -->
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
 <header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>Make Your Booking...</h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" ><a href="customer.php">Home</a></li>
								
                                                                <li role="presentation"><a href="booking.php">Book</a></li>
                                                                <li role="presentation"><a href="update.php">Update</a></li>
                                                                <li role="presentation"><a href="bookedTicket.php">My Bookings</a></li>
                                                              <li role="presentation"><a href="login.php"  onclick="return confirm('Are you sure to log out?');">Logout</a></li>
                                                                <li role="presentation"><a href="reomve.php">Deactivate</a></li>
								<li role="presentation"><a href="contacts.html">Contact</a></li>
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>
  
  <!-- Image header -->
 

  <!-- Grid -->

   
<!--  <div class="w3-row w3-padding w3-border">-->

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
                <style>
         
input{  
   font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 350px;
    outline: none;
    margin: 10px 0 10px 0;}
select{  
   font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 45px;
    padding: 7px 8px;
    width: 350px;
    outline: none;
    margin: 10px 0 10px 0;}
/*body {background-color: powderblue;}*/
p   { font-family: verdana;
    font-size: 150%;}
h6 { font-family: verdana;
    font-size: 200%;}
  
</style><!--
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large "style="height:10%;">
        
          <h2 style="text-align: center";>Select Your Booking Preference</h2>
          <br>
          <div class="select-boxes">
    <?php
   
 // $user_id=6;
     //$user_id=$_SESSION['id'];
    
    //Include database configuration file
    include('dbConfig.php');
    
    //Get all country data
    $query = $db->query("SELECT station_id,start_place FROM intermediate_station GROUP BY start_place");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?><style>

img { position: absolute; left: 50%; top: 50%;  margin: -63px 0 0 -182px;}
</style>
               <div class="login-page">
  <div class="form">
      <div >
          <img src="img/big.jpg" alt="Girl in a jacket" style="width:700px;height:530px; "> 
      </div>
<!--  <div class="slideshow-container" style="  position: absolute; right: 65px; ;width: 800px; ">
  <div class="mySlides fade" >
      
    <div class="numbertext">1 / 3</div>
    <img src="img/70266210-bus-wallpapers.jpg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img/volvo2.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img/ELEC_CITY.0.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>-->

<!--<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> -->
  
    <form class="login-form" >
    <select name="country" id="country" >
        <option value="">From</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['station_id'].'">'.$row['start_place'].'</option>';
            }
        }else{
            echo '<option value="">City Not Available</option>';
        }
        ?>
    </select>
    
    <select name="state" id="state">
        <option value="">Select Starting Place first</option>
    </select>
        <select name="route" id="route">
        <option value="">Select Destination first</option>
    </select>
    
    <select name="city" id="city">
        <option value="">Select Route first</option>
    </select>
    <select name="type" id="type">
        <option value="">Select Bus First</option>
    </select>
        <select name="date" id="date">
        <option value="">Select Type First</option>
    </select>
          
        <select name="time" id="time">
            <option value="">Select Date First</option>
            
            //<?php 
//    // connecting to DB
//            if(empty($_GET['time'])){
//    $con=  mysqli_connect('localhost','root','bd13011996','ticketbooking');
//    // enable hebrew input
//    mysqli_set_charset($con,'utf8');
//    // read the city table from DB
//    $sql = mysqli_query($con,"SELECT date FROM date");
//    
//    while ($row = mysqli_fetch_array($sql)){
//    // creating temporary variable for each row
//    $city1=$row["date"];
//    //assigning a value to each option in dropdown list
//    echo "<option value=\"$city1\"> $city1 </option>";
//            }}
//    ?>
        <!--<option value="">Select time First</option>-->
    </select>
        <input type="submit" class="button" name="insert" value="Confirm" />
          </form>
  </div>
</div>
<!--    <select name="type" id="type">
        <option value="">Select Time First</option>
    </select>
    <select name="bus" id="bus">
        <option value="">Select Type First</option>
    </select>
    <select name="seat" id="seat">
        <option value="">Select Bus First</option>
    </select>
     <input type="submit" class="button" name="insert" value="Confirm" />-->
    </div>

          
            
      </div>
      
    </div>

  </div>

</div>


</body>
<?php

include('dbConfig.php');

    
    //echo '<script>window.location="PatientSelect.php"</script>';
//$query = $db->query("SELECT date,date FROM date");
//    
//    //Count total number of rows
//$rowCount = $query->num_rows;
//    
//    //Display cities list
//    if($rowCount > 0){
//        echo '<option value="">Select Date</option>';
//        while($row = $query->fetch_assoc()){ 
//            echo '<option value="'.$row['date'].'">'.$row['date'].'</option>';
//    }}
  

if($_GET){
   
  $datee=$_GET['date'];
    if(isset($_GET['insert'])){
         $query = $db->query("SELECT date,bus_id from date WHERE date_id= '$datee'");
    
    
    //Count total number of rows
    $rowCount = $query->num_rows;
     if($rowCount > 0){
      //  echo '<option value="">Select Type</option>';
        while($row = $query->fetch_assoc()){ 
            
            $date=$row['date'];
            //echo '<option value="'.$row['bus_id'].'">'.$row['date'].'</option>';
     }}
        $station_id=(string)$_GET['route'];
        $bus_id=$_GET['type'];
        $time=$_GET['time'];
        
        $t=($_POST["route_id"]);
    //global $t;
    $query1 = $db->query("SELECT route_id FROM intermediate_station WHERE station_id = '$station_id'");
    $rowCount1 = $query1->num_rows;
    if($rowCount1>0){
    $row1 = $query1->fetch_assoc();
    $route_id=$row1["route_id"];}
    else{$d="167";}
    $_SESSION['station_id'] = $station_id;
    $_SESSION['bus_id'] = $bus_id;
    $_SESSION['time'] = $time;
    $_SESSION['route_id'] = $route_id;
    $_SESSION['date'] = $date;
    $_SESSION['seats']=array();
       // $u1=$_GET['city'];
        
echo '<script>window.location="preference.php"</script>';
}

    }
?>
</html>
















 
