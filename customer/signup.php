<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

<link rel="stylesheet" href="css/style_3.css">

  
</head>

<body style="background-color: white;">
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Welcome To BuzOn</h1><span> <i class='fa fa-paint-brush'></i> + <i class='fa fa-code'></i> by <a >InnoTeq</a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i ></i>
<!--    <div class="tooltip">Click Me</div>-->
  </div>
  <div class="form">
    <h2>Enter Details To Join BuzOn</h2>
<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:49 PM
 */


session_start();
if(isset($_POST['submit'])) {
    if (($_POST['password']) != $_POST['cpassword']) {
        echo "password do not match";
    }
    else{
        $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
        $email = ($_POST['email']);
        $sql1 = "SELECT * FROM login WHERE email = '$email'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
        $username = strip_tags($_POST['name']);
        if (mysqli_num_rows($result1) > 0) {
            echo "Provided Email is already in use";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email Enter a  valid email address");
        } else {
            $password = md5(strip_tags($_POST['password']));
            if (empty($password)) {
                echo "Please enter password.";
            } elseif (strlen(strip_tags($_POST['password'])) < 6) {
                echo "Too small password";
            } else {
                
                $phone = ($_POST['phone']);
                
                $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking") or die ("Failed to connect");
                $query = "INSERT INTO customer(name,email,ph_number) VALUES('$username','$email','$phone')";
                $querylogin = "INSERT INTO login(email,password,role,status) VALUES('$email','$password','customer','active')";

                $result = mysqli_query($db, $query);
                $resultlogin = mysqli_query($db, $querylogin);

                if ($resultlogin and $result) {
                    echo "Succesfully registered";
                    header('Location: login.php');
                } else {
                    echo "Failed to register";
                }
            }
        }
    }
}
?>

<!--            <h1>BECOME BUS OPERATOR</h1>-->
<!--            <?php
            echo "BECOME BUS OPERATOR"
//            ?>

            <form method="post" action="bussignup.php">
                <input type="submit" name="bus" value="BUS OPERATOR">

            </form>-->
<!--<h1>SIGNUP AS CUSTOMER</h1>-->
            <?php
//
            echo "SIGNUP AS CUSTOMER<br/>";
            echo '<br/>';
        
//            ?>

            <?php
            if (isset($_POST['bus'])){
                ?>
                <a href = "bussignup.php" >Login</a>

            <?php }
            ?>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">

        <!--


        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }
        //--></script>
    <form method="post" action="signup.php">
<!--        <label><b>Name  </b></label>-->
        <div class="td">
            <input type="text" name = "name" placeholder="Enter username">
        </div>
<!--        <label><b>Email  </b></label>-->
        <div class="td">
            <input type="text" name="email" placeholder="Enter mail here">
        </div>
<!--        <label><b>Phone Number  </b></label>-->

        <div class ='td'>
            <input type="int" name="phone" placeholder="Enter ph no">
        </div>
<!--        <label><b>Password  </b></label>-->

        <div class='td'></div>
        <input type="password" name="password" placeholder="Password" id="txtNewPassword" />
        <input type="password" name="cpassword" placeholder="Confirm Password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" />
        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
        </div>
    
<!--        <label><b>Confirm Password </b></label>-->

<!--       <div class="td">
            
        </div>
       
        </div>-->

        <input type="submit" name="submit" value="Register">
        <div class="cta"><a href="bussignup.php" >Sign Up As a Bus Operator</a></div>
    </form>
