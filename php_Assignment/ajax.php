<?php
    $con= mysqli_connect('localhost', 'root' , '', 'user record');
    $ID=$_POST["id"];
   
    $sql = "SELECT * FROM teacher
                WHERE
                id = $ID;
                ";

    $fetch = mysqli_query( $con , $sql);
    $row = mysqli_fetch_assoc($fetch);
    echo json_encode($row);
   

?>