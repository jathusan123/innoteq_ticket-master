<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 04-Oct-17
 * Time: 01:22 AM
 */

session_start();

if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $db = mysqli_connect("localhost", "root", '', "ticketbooking") or die ("Failed to connect");
    $sql1 = "SELECT * FROM customer WHERE email = '$email'";
    $query=mysqli_query($db,$sql1);
    if ($query){
        $row = mysqli_fetch_row($query);
        $id=$row[0];
        $_SESSION['id']=$id;
        $username=$row[1];
      //  $_SESSION['user_id']=$row['user_id'];
    }

}
else {
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html>

<?php
$db = mysqli_connect("localhost", "root", '', "ticketbooking");
?>
<html>
<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<!--<link type="text/css" rel="stylesheet" href="style.css"/>-->
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
	<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
        <link href="css/style_2.css" rel="stylesheet">	
<head>
    <title>Welcome user</title>
</head>

<!--<h3>Welcome <?php echo $username; ?>. </h3>-->
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
<body class="w3-white">

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
                                                            <li role="presentation" class="active"><a href="customer.php">Home</a></li>
								
                                                                <li role="presentation"><a href="booking.php">Book Ticket</a></li>
                                                                <li role="presentation"><a href="update.php">Update Profile</a></li>
                                                                <li role="presentation"><a href="bookedTicket.php">My Bookings</a></li>
                                                                <!--<li role="presentation"><a href="Add_Bus.php">Add Bus</a></li>-->
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
    

<style>

img { position: absolute; left: 50%; top: 30%;  margin: -63px 0 0 -182px;}
</style>
   
      <div >
          <img src="img/ELEC_CITY.0.jpg" alt="Girl in a jacket" style="width:800px;height:500px; "> 
      </div>
    <!-- Image header -->


    <!-- Grid -->
<!--    <div class="w3-row w3-padding w3-border">-->

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
<!--            <div class="w3-container w3-white w3-margin w3-padding-large">-->

<!--                <h2 style="text-align: center";>Select Option </h2>
                <br>-->
                <div class="select-boxes">
                </div>
<!--            </div>-->

<!--<form action="bookedTicket.php">
        <input type="submit" name="BookedTicket" value="BookedTicket">

    </form>-->
<!--<form action="update.php">
    <input type="submit" name="update" value="Update My Profile">

</form>-->
<style>
    h1{
/*        position:relative;*/
         font-size:30px;
    }
   
</style>
<div class="container" >
			<div class="about" >			
					<div class="row" >
						<div class="recent" >
                                                    <button class="btn-primarys" style="width:30%; "><h3 >About us</h3></button>
							<hr>
						</div>
					</div>	
    	<div class="col-lg-3">
					<div class="widget">
						<h5 class="widgetheading">Contact</h5>
						<ul class="link-list">
							<li><a href="#">Team InnoTeq</a></li>
							<li><a href="#">E-Mail InnoTeq@gmail.com</a></li>
							<li><a href="#">+9407753624</a></li>
                                                       
						</ul>
					</div>
         <ul class="social-network">
							 <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
							<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
							<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
							<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
							<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
						</ul>
				</div>
           <div class="col-lg-6">
						
					</div>

    

                            	

                            
                            
                            
                            
                            
                            
                            <!--<form action="index.php">-->
    
<!--    <input type="submit" name="logout" value="Logout">
</form>

<form action="reomve.php">
    <input type="submit" name="remove" value="Deactivate My Account">

</form>




</body>
</html>
