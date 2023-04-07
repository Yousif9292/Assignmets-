<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_st.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Student and Teachers Data</title>
</head>
<body>
    <div>
    <form name="submit_form" method="POST" action="U_record.php"  onsubmit="return validateForm()" required>
    <input type="hidden" name="new" value="1" />

        <label>Name:</label>
        <input type="text" name="name" id="name">

        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name" id="last_name">

        <br>
        <label>Email:</label>
        <input type="email" name="email" id="email">
        
        <br>
        <select name="Status" class="form-select  form-select-sm mb-3"> 
            <option selected>Select User Status </option>
           <option value="1" > Active</option>
           <option value="0" >Inactive</option>
        </select>



       
        <select name="user_type" class="form-select  form-select-sm mb-3"> 
            <option selected>Select User Type </option>
           <option value="Student" > Student</option>
           <option value="Teacher" >Teacher</option>
        </select>

        <br>
        <input type="submit" value="submit" formtarget="_self">

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