<?php

$con = mysqli_connect('localhost', 'root', '', 'user record');

$ID= mysqli_real_escape_string($con, $_POST['id']);
$last_name= mysqli_real_escape_string($con, $_POST['last_name']);
$name= mysqli_real_escape_string($con, $_POST['name']);
$email= mysqli_real_escape_string($con, $_POST['email']);
$user_type= mysqli_real_escape_string($con, $_POST['user_type']);
$Status= mysqli_real_escape_string($con, $_POST['Status']);

$query= "UPDATE teacher SET  name='$name', last_name='$last_name' , email='$email' ,
user_type='$user_type', Status='$Status' WHERE id='$ID'";

$result = mysqli_query($con, $query);

header('location:display.php');
?>