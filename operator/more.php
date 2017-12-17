<html>
<?php
session_start();
 include('dbConfig.php');
$bus_name=$_SESSION['bus_name'] ;
   $bus_number=$_SESSION['bus_number'] ;
    $bus_route=$_SESSION['bus_route'] ;
   $bus_seats= $_SESSION['bus_seats'] ;
   $bus_type= $_SESSION['bus_type'] ;
   $op_id=$_SESSION['user_id'];
     $sql153 = $db->query("SELECT start_place FROM route where route_id='$bus_route'");
                    
    $row153 = mysqli_fetch_array($sql153);
         $dest=$row153['start_place'];
              $city1=array();
                  include('dbConfig.php');
            if(empty($_GET['time'])){

                    $sql = $db->query("SELECT * FROM timeslots");
                    
    while ($row = mysqli_fetch_array($sql)){
    // creating temporary variable for each row
    $city1[]=$row["time"];
    $_SESSION['city2']=$city1;
    
   
    //assigning a value to each option in dropdown list
    //echo "<option value=\"$city1\"> $city1 </option>";
            }}
   $city3=array();
     
        if(3>1){

                      $sql1 = $db->query("SELECT * FROM place WHERE place != '$dest'");

    while ($row13 = mysqli_fetch_array($sql1)){
    // creating temporary variable for each row
        
    $city3[]=$row13["place"];
        $_SESSION['city3']=$city3;
       

    //assigning a value to each option in dropdown list
    //echo "<option value=\"$city1\"> $city1 </option>";
            }}
    
    
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
     <link href="css/bootstrap.min_1.css" rel="stylesheet">
	<link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style_2.css" rel="stylesheet">
    
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
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
 color: black;}

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

  <!-- Header -->

<!-- Navigation bar with social media icons -->
<header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>Add your bus details here...</h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								   <li role="presentation" class="active"><a href="operator.php">Home</a></li>
								  <li role="presentation"><a href="booking.php">Book Ticket</a></li>
                                                                <li role="presentation"><a href="update.php">Update Profile</a></li>
                                                                <li role="presentation"><a href="bookedTicket.php">My Bookings</a></li>
                                                                <li role="presentation"><a href="Add_Bus.php">Add Bus</a></li>
                                                                <li role="presentation"><a href="login.php"  onclick="return confirm('Are you sure to log out?');">Logout</a></li>
                                                                <li role="presentation"><a href="reomve.php">Deactivate</a></li>
								<!--<li role="presentation"><a href="contacts.html">Call</a></li>-->
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>

  
  
  <!-- Image header -->
 

  <!-- Grid -->
  
       <div class="login-page">
  <div class="form">
  
    <form class="login-form" >
       <label><b>Select Time Slots </b></label>
 <div class ='td'>
           <select name="time" id="time">
             <option selected="selected">Select A Time Slot</option>n
     
             <?php
            foreach($_SESSION['city2'] as $item){

        ?>

        <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>

        <?php
    } ?>
             </select>
            <input type="submit" class="button" name="select_time" value="Select time" />
          <input type="submit" class="button" name="cancel" value="Cancel " />
 </div>
                <label><b>Select Intermediate Stations </b></label>
        <div class ='td'>
           <select name="int" id="int">
            <option value="">Select Districts</option>
              <?php
 
            foreach($_SESSION['city3'] as $item1){
                

        ?>

        <option value="<?php echo strtolower($item1); ?>"><?php echo $item1; ?></option>

        <?php
    } ?>
                 
             </select>
                        <input type="text"  name="amount" placeholder="Enter Fare" />

            <input type="submit" class="button" name="select_district" value="Select" />
          <input type="submit" class="button" name="cancel1" value="Cancel " />
 </div>
                <input type="submit" class="button" name="submit" value="Confirm" onclick="return confirm('Are You Sure  ?');" />
                  </form>
  </div>
</div>
 <?php
    $temp="Selected Time Slots";
    if($_GET){
   
     
    
    if(isset($_GET['select_time']) ){
        $time1= ($_GET['time']);
       if((!in_array($time1, $_SESSION['time1']))){
       array_push($_SESSION['time1'],$time1); 
       }
       else{
           echo "<script type='text/javascript'>alert(' You Have Already selected the time')</script>";
       }
//       $seats =$_SESSION['seats'] ;
       echo "Selected Time Slots";
       $temp="";
        foreach($_SESSION['time1'] as $so){
        $temp=$temp." ".$so;
        echo " ";  
        echo $so;
        
        }
       $temp="Selected Time Slots"+$temp;
       $_SESSION['temp']=$temp;
       // echo '<script>window.location="Check.php"</script>';
    }
    }
    if($_GET){
       
    
    
    
    if(isset($_GET['cancel']) ){
        $_SESSION['time1']=array();
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
     if($_GET){
   
     
    
    if(isset($_GET['select_district']) ){
        
        $int= ($_GET['int']);
        if(isset($_GET['amount']) && !trim($_GET['amount']) == ''){
        $fare=($_GET['amount']);
       if((!in_array($int, $_SESSION['int']))){
       array_push($_SESSION['int'],$int); 
        array_push($_SESSION['amount'],$fare); 
       }
       else{
          echo "<script type='text/javascript'>alert('You Have Already selected the district')</script>";
       }
       
      
       
//       $seats =$_SESSION['seats'] ;
       echo "Selected Time Slots";
       foreach($_SESSION['time1'] as $so){
        echo " ";  
        echo $so;
        
        }
        echo"<br />";
       echo "Selected Districts";
       $j=0;
        foreach($_SESSION['int'] as $so){
        echo " ";  
        echo $so;
        echo $_SESSION['amount'][$j];
        $j=$j+1;
        }
       
       // echo '<script>window.location="Check.php"</script>';
    }
    else{
         echo "<script type='text/javascript'>alert('Enter Fare for the district')</script>";
    };
     }}
    if($_GET){
       
    
    
    
    if(isset($_GET['cancel1']) ){
        $_SESSION['int']=array();
           $_SESSION['amount']=array();
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
     if($_GET){
       
    
    
 
     if(isset($_GET['submit']) ){
         if(sizeof($_SESSION['time1'])==0 || sizeof($_SESSION['int'])==0){
             echo "<script type='text/javascript'>alert('Select atleast one time or district')</script>";
         }
         else{
         $query15 = $db->query("INSERT INTO bus (name,total_seats,available_seats,route_id,bus_number,type,operator_id )VALUES( '$bus_name', '$bus_seats','$bus_seats','$bus_route','$bus_number','$bus_type','$op_id' )");
          $sql15 = $db->query("SELECT bus_id FROM bus where bus_number='$bus_number'");
                    
    $row15 = mysqli_fetch_array($sql15);
         $bus_id1=$row15['bus_id'];
          
         foreach($_SESSION['time1'] as $slot){
            // echo  $slot;
        $query16 = $db->query("INSERT INTO bus_timeslot (bus_id,time_slots )VALUES('$bus_id1','$slot')");
        
        }
     $i=0;
     foreach($_SESSION['int'] as $inter){
         
      $sql18 = $db->query("SELECT start_place,destination FROM route where route_id='$bus_route'");
                   
   $row18 = mysqli_fetch_array($sql18);
       $bus_id18=$row18['start_place'];
       $end=$row18['destination'];
       $amount= (int)($_SESSION['amount'][$i]);
      // echo $amount;
        $i=$i+1;
      $query17 = $db->query("INSERT INTO intermediate_station (start_place,inter_station,route_id,amount,bus_id )VALUES('$bus_id18','$inter','$bus_route','$amount','$bus_id1')");  
        }
       //$query17 = $db->query("INSERT INTO intermediate_station (start_place,inter_station,route_id,amount )VALUES('$bus_id18','$inter','$bus_route','$amount')");  
     echo "<script type='text/javascript'>alert('Success Fully Added..')</script>";
        echo '<script>window.location="operator.php"</script>';
         }}} 
?>

  