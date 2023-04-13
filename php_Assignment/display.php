<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From Database</title>
    <link rel="stylesheet" href="display.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- for modal form  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/components/modal/">
    <link rel="preconnect" href="https://AK7KMZKZHQ-dsn.algolia.net" crossorigin="">
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->

    <!-- PDF Button -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

</head>
<body>
  
  <h3>User Record</h3>
  <a href="form task.php"><button  id="creat_btn1"   type="button"> Creat New User </button></a>
  <div id="contact"><button type="button" id="creat_btn2"  class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Modal Form</button></div>
  
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
          <td>  <div id='contact'><button type='button' id='up_btn' data-id='$row[id]'  class='btn btn-info btn upbtn' data-toggle='modal' >Update</button></div>
        &nbsp 
          <form action='delete.php' method='POST' id='del_btn'>
          <input type='hidden' name='id' id='id' value='$row[id]'>
          <div >
          <button  class='btn btn-error submitForm' name='archive' type='submit' >Delete</button>
          </div>
          </form></td>
          </tr>\n";   
    }
?>

<table class="table table-border table-hover table-striped" id="example" >
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



<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
   </script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- AJAX CND -->
<script  src=""></script>


<!-- sweet alert -->
<script>
  $('.submitForm').on('click',function(e){
    e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>


<script>
  function validateForm() {
    var x = document.forms["submit_form"]["name", "last_name", "email"].value;
    if (x == "") {
      alert("Must Fill All Felids");
      return false;
    }
  }
</script>

<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                // orientation: 'landscape',
                // pageSize: 'LEGAL'
                exportOptions:{
                  columns:[0, 1, 2, 3, 4, 5]
                }
            }],
        'columnDefs': [{
                'searchable': false,
                'orderable': false,
                'targets': [6]
        }],

      });
    });

  </script>

<script>
  $(".upbtn").on('click', function(){
    var id= $(this).attr("data-id");

    $.ajax({
      type: 'POST',
      url: './ajax.php/',
      
      data:{id: id},
      success:function(data){
        var json = JSON.parse(data);
        $('#ID').val(json.id);
        $('#name').val(json.name)
        $('#last_name').val(json.last_name)
        $('#email').val(json.email)
        $('#Status').val(json.Status)
        $('#user_type').val(json.user_type)
        $("#update-modal").modal('show');
      }
    })
  });
</script>

<!-- <script>
  $("#up_btn").on('click', function(){
    var id= $(this).attr("data-id");
    
$.ajax{
  method: 'POST',
  dataType: 'json',
  url: './ajax.php/',
  data:{id: id},
  success.function(data)
  {
    var json= JSON.parse(data);
    $('#ID').val('json.')
  }
}
    })
  });
</script> -->

<!-- the modal form start  for creat new user   -->
<div class="modal fade" id="contact-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creat New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="contactForm" name="submit_form" role="form"  method="POST" action="U_record.php"  onsubmit="return validateForm()" required>
          <div class="modal-body">				
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <select name="Status" class="form-select  form-select-sm mb-3"> 
                <option selected>Select User Status </option>
                <option value="1" > Active</option>
                <option value="0" >Disactive</option>
              </select>
            </div>
            <div class="form-group">
              <select name="user_type" class="form-select  form-select-sm mb-3"> 
                <option selected>Select User Type </option>
                <option value="Student" > Student</option>
                <option value="Teacher" >Teacher</option>
              </select>
            </div> 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" id="Submit">
            </div> 
          </div>
        </form>  					
      </div>
    </div>
  </div>
</div>
<!-- modal form end -->

<!-- Update Modal Form Start -->


<!-- Modal -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="updateForm" name="submit_form" role="form"  method="POST" action="ajax_updata_pro.php"   required>
        <div class="modal-body">				
          <div class="form-group">
            <input type="hidden" name="ID" id="ID" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" value="">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="">
          </div>
          <div class="form-group">
            <select name="Status" class="form-select  form-select-sm mb-3" id="Status"> 
              <option selected></option>
              <option value="1" > Active</option>
              <option value="0" >Disactive</option>
            </select>
          </div>
          <div class="form-group">
            <select name="user_type" class="form-select  form-select-sm mb-3" id="user_type"> 
              <option selected></option>
              <option value="Student" > Student</option>
              <option value="Teacher" >Teacher</option>
            </select>
          </div>					
          
          <div class="modal-footer">					
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" id="submit">
          </div>

          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary">
          </div> -->
        </div>    
      </form>
      </div>
     
    </div>
  </div>
</div>





<!-- Update Modal End -->







</body>
</html>