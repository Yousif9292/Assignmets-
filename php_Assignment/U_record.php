<?php

$con = mysqli_connect('localhost', 'root', '', 'user record');


$last_name= mysqli_real_escape_string($con, $_POST['last_name']);
$name= mysqli_real_escape_string($con, $_POST['name']);
$email= mysqli_real_escape_string($con, $_POST['email']);
$user_type= mysqli_real_escape_string($con, $_POST['user_type']);
$Status= mysqli_real_escape_string($con, $_POST['Status']);

$sql= "INSERT INTO `teacher`(`name`, `last_name`, `email`, `user_type` , `Status`) VALUES ('$name','$last_name','$email' , '$user_type' , '$Status')";


$rs= mysqli_query($con , $sql);

if($rs)
{ 
  echo '<script type= "text/JavaScript" >';
  
  echo 'alert("Racord submit successfully")';
  
  echo '</script>';
  mysqli_affected_rows($con);
}
header('location:display.php');

  


?>