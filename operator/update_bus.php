<?php
session_start();
$email= $_SESSION['email'];

$db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
$query = "select name,ph_number,email from bus_operator where email='$email'";
$result = mysqli_query($db, $query);
if ($row = mysqli_fetch_array($result)) {

    $username = $row['name'];
    $phone = $row['ph_number'];

}
mysqli_free_result($result);
mysqli_close($db);

if(isset($_POST['update'])&& (!(empty($_POST['name'])))){
    //echo $email;
    $username = $_POST['name'];
    //echo $username;
    //$id = $_POST['id'];
    //$email=($_POST['email']);
    $phone=($_POST['ph_number']);

    $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
    $query1 = "update bus_operator set name='$username',ph_number='$phone' where email='$email'";
    $result1 = mysqli_query($db,$query1);
    if($result1) {
        //echo $email;
        //echo "Succesfully updated";
        header('Location: operator.php');
    }
    else {
        echo "Failed to update";
    }
}



?>
<!DOCTYPE html>


<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>-->
<link href="css/bootstrap.min_1.css" rel="stylesheet">
	<link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
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
        height: 35px;
        padding: 7px 8px;
        width: 200px;
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
<body style="background-color: #1d93d1 ">

<!-- Navigation bar with social media icons -->
<!--<div class="w3-bar w3-black w3-hide-small" style="height:5%">
    <a href="customer.php" class="w3-bar-item w3-button" ><i class="fa fa-home"></i></a>
    <a href="booking.php" class="w3-bar-item w3-button" ><i class="fa fa-bus"></i></a>
        <a href="bookedTicket.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a>
    <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
    <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-phone"></i></a>
    <a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
</div>-->
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
        <header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>Welcome To BuzOn <?php echo $username; ?></h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active"><a href="operator.php">Home</a></li>
								
                                                                    <li role="presentation"><a href="book.php">Book</a></li>
                                                                    <li role="presentation"><a href="update_bus.php">Update</a></li>
                                                                    <li role="presentation"><a href="details.php">My Details</a></li>
                                                                <li role="presentation"><a href="availability.php">Availability</a></li>
                                                              
                                  
                                               
								<li role="presentation"><a href="contacts.html">Contact</a></li>
                                                                <li role="presentation"><a href="login.php"  onclick="return confirm('Are you sure to log out?');">Logout</a></li>
                                                               <li role="presentation"><a href="reomve.php">Deactivate</a></li>
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>
    

<!-- Navigation bar with social media icons -->



    <!-- Header -->
   

    <!-- Image header -->


    <!-- Grid -->
   
<form method="post" action="update_bus.php">

    <label style="color: black; font-size:20px">Name:___ </label>
    <input type="text" name="name" value="<?php echo $username;?>"><br><br>
    <label style="color: black; font-size:20px">E-Mail:___ </label>
    <input type="text" name="email" value="<?php echo $email;?>"readonly><br><br>
    <label style="color: black; font-size:20px">TP No:___</label>
    <input type="int" name="ph_number" value="<?php echo $phone?>"><br><br>

    <input type="submit" name="update" value="Update" onclick="return confirm('Are you sure to update your details?');">

</form><br>



</body>
</html>