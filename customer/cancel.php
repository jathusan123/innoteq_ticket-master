
<!DOCTYPE html>
<html>
<head>
    <title>PHP-SQL Login</title>
</head>
<body>
<html>
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
        width: 150px;
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

<!-- Navigation bar with social media icons --><header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
<!--								<a href="index.html"><h1>Welcome To BuzOn <?php echo $username; ?></h1></a>-->
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="index.html">Home</a></li>
								
                                                                <li role="presentation"><a href="booking.php">Book</a></li>
                                                                <li role="presentation"><a href="update.php">Update</a></li>
                                                                <li role="presentation"><a href="bookedTicket.php">My Bookings</a></li>
                                                                <li role="presentation"><a href="blog.html">Logout</a></li>
                                                                <li role="presentation"><a href="reomve.php">Deactivate</a></li>
								<li role="presentation"><a href="contacts.html">Contact</a></li>
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logon.jpg" alt="Girl Hat" style="width:20%" class="w3-padding-16"></a></h1>
        <h6>Welcome to  <span class="w3-tag">BusOn</span></h6>


    </header>
    <?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 08-Nov-17
 * Time: 11:42 AM
 */echo "Are you sure to cancel ticket?";
session_start();
 ?>
<form method="post" action="cancel.php">
    <input type="submit" name="yes" value="yes">

</form>
<?php
if(isset($_POST['yes'])) {
    $booking_id=$_SESSION['booking_id'];

    $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking");
    $sqldel="delete from booking where booking_id=$booking_id";
    $querydel=mysqli_query($db,$sqldel);
    if($querydel){
        echo"Your Booking Has Canceled";
    }
    ?>
    <form method="post" action="customer.php">
    <input type="submit" name="customer" value="Goto Home">

</form>

<?php
}
?>


    <!-- Image header -->


    <!-- Grid -->


            