<?php
session_start();
$email= $_SESSION['email'];
//if (isset($_POST['search'])) {
    //$id = $_POST['id'];
    //echo $email;
    $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
    $query = "select name,ph_number from customer where email='$email'";
    $result = mysqli_query($db, $query);
    if ($row = mysqli_fetch_array($result)) {

        $username = $row['name'];
        //$email = $row['email'];
        $phone = $row['ph_number'];
        //echo $username;
        // header('Location: login.php');
    }
    mysqli_free_result($result);
    mysqli_close($db);



//}
//else {
    //$username ='' ;
    //$email='';
    //$phone='' ;
//}
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    //$id = $_POST['id'];
    //$email=($_POST['email']);
    $phone=($_POST['ph_number']);

    $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
    $query = "update customer set name='$username',ph_number='$phone' where email='$email '";
    $result = mysqli_query($db,$query);
    if($result) {
        echo "Succesfully updated";
         echo '<script>window.location="customer.php"</script>';
        
        //header('Location: login.php');
    }
    else {
        echo "Failed to update";
    }
}

?>
<!DOCTYPE html>
<html>
<!--<head>
    <title>Your details</title>
</head>
<body>
<h1>Update Your Details</h1>
<html>
<title>Demo|Lisenme</title>-->
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

<link rel="stylesheet" href="css/style_3.css">
<link href="css/bootstrap.min_1.css" rel="stylesheet">
	<!--<link href="css/responsive-slider.css" rel="stylesheet">-->
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
<body class="w3-blue">

<!-- Navigation bar with social media icons -->
<header>
		<div class="container" style="width:100%;">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a ><h1>Update Your Details</h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								     <li role="presentation" class="active"><a href="customer.php">Home</a></li>
								
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

     
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logo_bus.png" alt="Girl Hat" style="width:10%; " class="w3-padding-16"></a></h1>
        <h6>Welcome to  <span class="w3-tag">BusOn</span></h6>


    </header>


    <!-- Image header -->


    <!-- Grid -->
   

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
            <!--<div class="w3-container w3-white w3-margin w3-padding-large">-->
<form method="post" action="update.php">
    <div>
        <label>
            <span style= "font-size: 16px;">  Name:      </span>
        </label>
                    

        <!--<input id="cvv" size="6" type="text" value="" autocomplete="off" required />-->
    </div>
     <input type="text" name="name"  style="color: black;"value="<?php echo $username;?>">
    <div>
        <label>
            <span style= "font-size: 16px;">  Email:      </span>
        </label>
        </div>
     <input type="text" name="email" style="color: black;"value="<?php echo $email;?>"readonly>
     <div>
        <label>
            <span style= "font-size: 16px;"> Phone Number:      </span>            <!--<input type="text" name="name"  style="color: black;"value="<?php echo $phone;?>"><br><br>-->
        </label>
    </div>
        <input type="int" name="ph_number" style="color: black;" value="<?php echo $phone?>"><br><br>    

    

    <input type="submit" name="submit" style="color: black;" value="Update Details">
</form>
</body>
</html>