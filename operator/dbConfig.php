<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'ticketbooking';
 $con=mysqli_connect("localhost","root","bd13011996","ticketbooking");
//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>