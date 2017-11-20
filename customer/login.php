<!DOCTYPE html>
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
    <h2>Login to your account</h2>
    <form method="post" action="login.php">
      <input type="text"  name="email" placeholder="Username"/>
      <input type="password"  name="password" placeholder="Password"/>
       <input type="submit" name="submit" value="Login">
    </form>
  </div>
<!--  <div class="form">
    <h2>Create an account</h2>
    <form>
      <input type="text"  placeholder="Username"/>
      <input type="password"   placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>-->
  <div class="cta"><a href="signup.php" >Sign Up Now</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:40 PM
 */


session_start();
if(isset($_POST['submit'])) {
    require('config.php');
    $email = ($_POST['email']);
    $_SESSION['email'] = $email;
    $password = strip_tags(md5($_POST['password']));
    $sql = "SELECT * FROM login where email = '$email'";

    $db = mysqli_connect("localhost", "root", 'bd13011996', "ticketbooking");

    $query = mysqli_query($db, $sql);

    if($query)
    {
        $row = mysqli_fetch_row($query);
        $emailDB=$row[0];
        $passwordDB = $row[1];
        $role=$row[2];
        $status=$row[3];
        $_SESSION['role'] = $role;
        if($status=='active') {
            if ($email == $emailDB && $password == $passwordDB) {
                $_SESSION['email'] = $email;
                if ($role == "bus") {
                    header('Location: busoperator.php');
                } elseif ($role = "customer") {
                    header('Location: customer.php');

                }
            } else {
                echo "Your password is incorrect.";
            }
        }
    }


    else {
        echo "<b><i>Incorrect credentials</i><b>";
    }
}
?>



    <!-- Image header -->


    <!-- Grid -->

<!--            <h1>Login</h1>
        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Enter email">
            <input type="password" name="password" placeholder="Enter password here">
            <input type="submit" name="submit" value="Login">
        </form>-->

<!--<a href="signup.php" >Register</a>-->

