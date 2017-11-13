<?php 
session_start();
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["framework"]))
{
 $framework = '';
 $time=array();

 foreach($_POST["framework"] as $row)
 {    array_push($time, $row);
     echo $row;
  $framework .= $row . ', ';
 }
 $_SESSION['time'] = $time;
 $framework = substr($framework, 0, -2);
 //$query = "INSERT INTO like_table(framework) VALUES('".$framework."')";
 //if(mysqli_query($connect, $query))
// {
 // echo 'Data Inserted';
// }
}
?>
