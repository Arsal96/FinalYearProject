
<html>
 <head>
  <title>Diagnox.ai</title>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="../js/notify.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   /* .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   } */
  </style>
 </head>
 <body>
 <?php 
//  error_reporting(E_ALL ^ E_NOTICE);

//  if(!($_SESSION['type']) == 'normal user')
//     {
//     header("location: ../index.php");
//     exit;  
//      }
  ?>  



  <div class="container box">
   <h1 align="center" style="color:red">PATIENT's MANAGEMENT</h1>
   <!-- <br /> -->
   <div class="table-responsive">
    <!-- <br /> -->
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Patient</button>
    </div>
    <br />
    <!-- <br /> -->
    <table id="user_data" class="table table-bordered table-striped table-hover">
     <thead>
      <tr>
       <th width="10%">Image</th>
       <th>First name</th>
       <th>Last Name</th>
       <th >Address</th>
       <th>Contact No</th>
       <th>Appoinments</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add User</h4>
    </div>
    <div class="modal-body">
     <label>Patient First Name</label>
     <input type="text" name="first_name" id="first_name" required minlength="3" maxlength="14" class="form-control" />
     <br />
     <label>Patient Last Name</label>
     <input type="text" name="last_name" id="last_name" class="form-control" />
     <br />
     <label>Address</label>
     <input type="text" name="address" id="address" class="form-control" />
     <br />
     <label>Contact No</label>
     <!-- pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$"  -->
     <input type="text" name="phno" id="phno" class="form-control"   oninvalid="this.setCustomValidity('Input Correct Format. i.e: +92-333-1234567')"/>
     <br />
     <label>Date Of Birth</label>
     <input type="date" name="dob" id="dob" class="form-control" />
     <br />
     <label>Upload Patient Image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add User");
  $('#action').val("Add");
  $('#operation').val("Add");
 $('#user_uploaded_image').html('');
 });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"functions.php?action=fetch",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,3],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var firstName = $('#first_name').val();
  var lastName = $('#last_name').val();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#user_image').val('');
    return false;
   }
  } 
  if(firstName != '' && lastName != '')
  {
   $.ajax({
    url:"functions.php?action=insert",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
    //  alert(data);
    $.notify("Data Updated Successfully!","success",{align:"center",  showAnimation: 'slideDown'});
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"functions.php?action=fetch_single",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#first_name').val(data.first_name);
    $('#last_name').val(data.last_name);
    $('#address').val(data.address);
    $('#phno').val(data.phno);
    $('#dob').val(data.dob);
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"functions.php?action=delete",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
     $.notify("Data Deleted Successfully!","success",{align:"center",  showAnimation: 'slideDown'});

    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>
   
