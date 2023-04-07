 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From Database</title>
    <link rel="stylesheet" href="display.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
   
</head>
<body>
  <h3>User Record</h3>
    <a href="form task.php" target="_self"><button id="creat_btn" type="button">Creat New User</button></a> 
    <?php
    $con= mysqli_connect('localhost', 'root' , '', 'user record');
   
    $sql = "SELECT * FROM teacher";

    $fetch = mysqli_query( $con , $sql);
    $table ="";
    while ($row = mysqli_fetch_assoc($fetch))
    {
        if($row['Status'] == 1)
        {
          $btn= '<p class="badge bg-success">Active</p>';
        }
        else if($row['Status']== 0) 
        {
            $btn= '<p class="badge bg-danger">disactive </p>';
        }
        $table .= "<tr>
        <td> $row[id]</td>
        <td> $row[name]     </td>
        <td> $row[last_name]</td>
        <td> $row[email]    </td>
        <td> $btn</td>
        <td> $row[user_type]</td> 
        <td>  <button id='up_btn'><a href='update.php?id=$row[id]' class= 'text-decoration-none text-white'> Update </a></button>  &nbsp 
        <button id='del_btn' ><a href='delete.php?id=$row[id]'  class= 'text-decoration-none text-white'>Delete</a></button></td>
        </tr>\n";
        
    }
?>

<table class="table table-border" id="example" >
    <thead>
    <tr>
   
        <th style="text-align: center"> ID </th> 
        <th style="text-align: center"> Name </th>
        <th style="text-align: center"> Last Name </th>
        <th style="text-align: center"> Email</th>
        <th style="text-align: center"> Status</th>
        <th style="text-align: center"> User Type</th>
        <th style="text-align: center" > Action </th>
       
    </tr>
    </thead>
<tbody>
    <?php
    echo $table;
    ?>
   
</tbody>
</table>


<?php mysqli_close($con); ?>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



<script>
    

 $('#example').DataTable(
    {
        'columnDefs': [{

             'searchable': false,
             'orderable': false,
             'targets': [6]
    
    }],
  
} );
   
</script>




</body>
</html>