<?php

$ID=$_GET["id"];
$con = mysqli_connect('localhost', 'root', '', 'user record');


$query="DELETE FROM teacher WHERE id = $ID ";
$result=mysqli_query($con, $query);

header('Location: display.php');

?>