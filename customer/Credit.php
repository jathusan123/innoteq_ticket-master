<html>
<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
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
        width: 250px;
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

      

    <div class="w3-content" style="max-width:1600px">

    <!-- Header -->
        <header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>Enter Your Credit Card Details</h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active"><a href="customer.php">Home</a></li>
								
                                                                <li role="presentation"><a href="booking.php">Book Ticket</a></li>
                                                                <li role="presentation"><a href="update.php">Update Profile</a></li>
                                                                <li role="presentation"><a href="bookedTicket.php">My Bookings</a></li>
                                                                <li role="presentation"><a href="Add_Bus.php">Add Bus</a></li>
                                                                <li role="presentation"><a href="login.php"  onclick="return confirm('Are you sure to log out?');">Logout</a></li>
                                                                <li role="presentation"><a href="reomve.php">Deactivate</a></li>
								<!--<li role="presentation"><a href="contacts.html">Contact</a></li>-->
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>
    <body class="w3-white ">

    <form id="myCCForm" action="payment.php" method="post">
    <input id="token" name="token" type="hidden" value="">
    <div>
        <label>
            <span style= "font-size: 18px;">Card Number</span>
        </label>
        <input id="ccNo" type="text" size="20" value="" autocomplete="off" required />
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;">Expiration Date (MM/YYYY)</span>
        </label>
        <input type="text" size="2" id="expMonth" required />
        <span> / </span>
        <input type="text" size="2" id="expYear" required />
    </div>
    <div>
        <label>
            <span style= "font-size: 18px;"> CVC </span>
        </label>
        <input id="cvv" size="6" type="text" value="" autocomplete="off" required />
    </div>
    <input type="submit" value="Submit Payment" style=" font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;">
</form>
    <style>

img { position: absolute; left: 50%; top: 30%;  margin: -63px 0 0 -182px;}
</style>
   
      <div >
          <img src="img/ELEC_CITY.0.jpg" alt="Girl in a jacket" style="width:800px;height:500px; "> 
      </div>