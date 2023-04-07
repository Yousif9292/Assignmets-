
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_st.css">
    <title>Update Record</title>
</head>
<body>
<div>
   
    <?php
    $con= mysqli_connect('localhost', 'root' , '', 'user record');
    $ID=$_GET["id"];
   
    $sql = "SELECT * FROM teacher
                WHERE
                id = '$ID'
                ";

    $fetch = mysqli_query( $con , $sql);
    $row = mysqli_fetch_assoc($fetch)
?>
    <form name="submit_form" method="POST" action="update-pro.php"  onsubmit="return validateForm()" required>
    <h1> Edit User Record</h1>
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>">

        <label>Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']?>">

        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name'] ?>">

        <br>
        <label>Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
        
        <br>
        <select name="Status" class="form-select  form-select-sm mb-3"> 
            <option selected><?php echo $row['Status'] ?></option>
           <option value="1" > Active</option>
           <option value="0" >Inactive</option>
        </select>


<br>
       
        <select name="user_type" class="form-select  form-select-sm mb-3"> 
            <option selected> <?php echo $row['user_type'] ?> </option>
           <option value="Student" > Student</option>
           <option value="Teacher" >Teacher</option>
        </select>

        <br>
        <input type="submit" value="Save" formtarget="_self">

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    function validateForm() {
  var x = document.forms["submit_form"]["name", "last_name", "email"].value;
  if (x == "") {
    alert("Must Fill All Felids");
    return false;
  }
}
</script>

    
</body>
</html>