
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
include('dbConfig.php');
    session_start();
      //$columnValues= $_SESSION['seats'];
       $bus_id= $_SESSION['bus_id'];
        $route_id= $_SESSION['route_id'];
         $time= $_SESSION['time'];
         $date= $_SESSION['date'];
          $user_id= $_SESSION['id'];
          $station_id=$_SESSION['station_id'];  
          $query24 = $db->query("SELECT start_place,inter_station,amount FROM intermediate_station WHERE station_id='$station_id'");
  $rowCount24 = $query24->num_rows;
  $row24 = $query24->fetch_assoc();
  $amou=$row24['amount'];
  $start_place=$row24['start_place'];
  $destination=$row24['inter_station'];
  $_SESSION['start_place']=$start_place; 
  $_SESSION['destination']=$destination;
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
    $_SESSION['operator_id']=$n7;
    $a=array();

   for ($x = 1; $x <= $n; $x++) {
       if (!in_array($x, $columnValues)){
           array_push($a,$x); 
   } }
     
      
?>
<?php
$seat_al=$columnValues;
$seat_al2=array('1_1','1_2','1_4','1_5','2_1','2_2','2_4','2_5','3_1','3_2','3_4','3_5','4_1','4_2','4_4','4_5','5_1','5_2','5_4','5_5','6_1','6_2','6_4','6_5','7_1','7_2','7_4','7_5','8_1','8_2','8_4','8_5','9_1','9_2','9_4','9_5','10_1','10_2','10_4','10_5','11_1','11_2','11_4','11_5','12_1','12_2','12_3','12_4','12_5');
//for($x = 1; $x <= 49; $x++){
//    array_push($seat_al, $x);
//}
$d=array();
foreach ($seat_al as $pal){
    $key = $pal-1;
    $d2=$seat_al2[$key];
    array_push($d, $d2);
}
//$d=array('1_2', '13_2', '7_1', '7_4');
?>
<html>
    <style>
         
input{  
   font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 150px;
    outline: none;
    margin: 10px 0 10px 0;}
</style>
<head>
<title>Bus Ticket Reservation Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
<link href="css/style_1.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
	<h1>Select Your Seat Preference</h1>
	<div class="main">
		<h2>Book Your Seat Now?</h2>
		<div class="wrapper">
			<div id="seat-map">
				<div class="front-indicator"><h3>Front</h3></div>
			</div>
			<div class="booking-details">
						<div id="legend"></div>
						<h3> Selected Seats (<span id="counter">0</span>):</h3>
						<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
						
						Total: <b>Rs:<span id="total">0</span></b>
                                                <div class="form">
  
                                                    <form class="login-form" >
						
                                                <input type="submit" class="button" name="submit" value="Confirm" />
                                                <input type="submit" class="button" name="cancel" value="Cancel" />
			
                            </form>
                                                    </div>
                                                </div>
			<div class="clear"></div>
		</div>
		<script>
				var firstSeatLabel = 1;
                                var cars = [];
                                 
			  var myvar = <?php echo json_encode($d); ?>;
                           var amount = parseInt(<?php echo json_encode($amou); ?>);
				$(document).ready(function() {
 

  

					var $cart = $('#selected-seats'),
						$counter = $('#counter'),
						$total = $('#total'),
						sc = $('#seat-map').seatCharts({
						map: [
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
                                                        'ee_ee',
                                                        'ee_ee',
                                                        'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'eeeee',
						],
						seats: {
							
							e: {
								price   : amount,
								classes : 'economy-class', //your custom CSS class
								category: 'Economy Class'
							}					
						
						},
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return firstSeatLabel++;
							},
						},
						legend : {
							node : $('#legend'),
							items : [
								
								[ 'e', 'available',   'Available Seats'],
								[ 'f', 'unavailable', 'Already Booked']
							]					
						},
						click: function () {
                                                  //  var seats = ["dds"];
 
							if (this.status() == 'available') {
								//let's create a new <li> which we'll add to the cart items
								$('<li>'+this.data().category+' : Seat no '+this.settings.label+': <b>Rs'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);
								
								
                                                                /*
								 * Lets update the counter and total
								 *
								 * .find function will not find the current seat, because it will change its stauts only after return
								 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
								 */
                                                                cars.push(this.settings.id);
                                                                //var seats = sc.get('selected');
                                                                document.cookie ="cam=" + cars + ";";
								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+this.data().price);
								
								return 'selected';
							} else if (this.status() == 'selected') {
								//update the counter
                                                                var index = cars.indexOf(this.settings.id);
                                                                if (index > -1) {
                                                                cars.splice(index, 1);
                                                                        }
                                                                document.cookie ="cam=" + cars + ";";
								$counter.text(sc.find('selected').length-1);
								//and total
								$total.text(recalculateTotal(sc)-this.data().price);
							
								//remove the item from our cart
								$('#cart-item-'+this.settings.id).remove();
                                                               
								//seat has been vacated
								return 'available';
							} else if (this.status() == 'unavailable') {
								//seat has been already booked
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});

					//this will handle "[cancel]" link clicks
					$('#selected-seats').on('click', '.cancel-cart-item', function () {
						//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
						sc.get($(this).parents('li:first').data('seatId')).click();
					});

					//let's pretend some seats have already been booked
					sc.get(myvar).status('unavailable');
                                        //createCookie("height", $(window).height(), "10");
                                   
 

 
			
			
    
    });
             

			function recalculateTotal(sc) {
				var total = 0;
			
				//basically find every selected seat and sum its price
				sc.find('selected').each(function () {
					total += this.data().price;
				});
				
				return total;
			}
                        
         
		</script>
 
	</div>
	<p class="copy_rights">&copy; 2017 BusOn All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> InnoTeq</a></p>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
<?php
if($_GET){
   
     
    
    if(isset($_GET['submit']) ){
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
        
      echo $so;  
      $seat_id= ($so);
     $query1 = $db->query("INSERT INTO booking (date,time,route_id,bus_id,payment_status,seat_no,customer_id,operator_id,arrive_place,depart_place )VALUES( '$date', '$time','$route_id','$bus_id','None','$seat_id','$user_id','$n7','$start_place','$destination' )");
         }
         echo '<script>window.location="Check.php"</script>';
         
    }
    }
    if($_GET){
   
     
    
    if(isset($_GET['submit']) ){
        
        
        echo '<script>window.location="booking.php"</script>';
    }}
?>

