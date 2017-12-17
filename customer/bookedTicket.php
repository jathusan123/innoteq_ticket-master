<?php
session_start();
?>
<html>
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
<header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>Your Bookings </h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								     <li role="presentation" class="active"><a href="customer.php">Home</a></li>
								
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
<div class="w3-content" style="max-width:1600px">

<!--     Header 
-->    <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logo_bus.png" alt="Girl Hat" style="width:10%; " class="w3-padding-16"></a></h1>
        <h6>Welcome to  <span class="w3-tag">BuzOn</span></h6>


    </header>


    <!-- Image header -->


    <!-- Grid -->
    <div class="w3-row w3-padding w3-border">

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 08-Nov-17
 * Time: 04:19 PM
 */

$id=$_SESSION['id'];

$db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking");
$sqlcust = "SELECT * FROM booking where customer_id = '$id'";
$querycust=mysqli_query($db,$sqlcust);
if ($querycust) {
    $datenow = date("y,m,d");
    ?>

    <table border="2" style="background-color: #f2fbff; color: #285e8e; margin: 0 auto;">
        <thead>
        <tr>
            <th> Book Id</th>
            <th> Date</th>
            <th> Time</th>
            <th> Arrive Place</th>
            <th> Depature Place</th>
            <th> Seat No</th>
            <th> Payment</th>
            <th> Route</th>


        </tr>
        </thead
        <tbody>
       <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 4px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #50c0e9;
    color: white;
}
</style>

        <?php

        while ($row = mysqli_fetch_array($querycust)) {
            if ($datenow < $row[1]) {

                ?>

                <tr><?php
                    $i = 0;
                    while ($i < 8) {
                        ?>
                        <td><?php echo $row[$i]; ?></td><?php
                        $i++;
                    }
                    $_SESSION['booking_id'] = $row['booking_id'];
                    ?>

                    <td>
                        <form method="post" action="cancel.php">
                            <input type="submit" name="cancel" value="cancel" style="width: 80px" onclick="return confirm('Are you sure to cancel the current booking?');">

                        </form>
                    </td>
                </tr>


                <?php
            }
        }
        ?>
    </table>
    <?php
}
?>