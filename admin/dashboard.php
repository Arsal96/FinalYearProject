<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">

        <meta charset="utf-8"/>
    <title>DiagnoX.ai-Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta name="csrf-token" content="02xMj5p3FIMvjKR0i8cWU3WVc3vW8nAoTluXXl5M"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link media="all" type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/font-awesome/css/font-awesome.min.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/simple-line-icons/simple-line-icons.min.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/bootstrap/css/bootstrap.min.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/uniform/css/uniform.default.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css">


    <!-- BEGIN PAGE LEVEL STYLES -->
    <!-- <link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/select2/select2.css">
    <link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/jquery-multi-select/css/multi-select.css">
    <link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/fullcalendar/fullcalendar.min.css"> -->
    <!-- BEGIN THEME STYLES -->
<!-- FOR DATATABLES -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="../js/notify.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<link media="all" type="text/css" rel="stylesheet" href="./assets/global/css/components.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/css/plugins.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/admin/layout/css/layout.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/admin/layout/css/themes/darkblue.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/admin/layout/css/custom.css">
<link media="all" type="text/css" rel="stylesheet" href="./assets/global/plugins/froiden-helper/helper.css">









<body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 

        <!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="main.php">
                <h1 class="webname" style="color: cornsilk ; margin-top: -6px;">DiagnoX.ai</h1>
                <!-- <img src="./assets/global/img/hrm-logo.png" height="30px" /> -->

            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <!-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i> -->

                        
                    </a>


                    <!-- <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">0 pending</span> notifications</h3>

                        </li>
                                            </ul> -->
                </li>

                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">

                    <span class="username username-hide-on-mobile">
                  Admin</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> My Profile </a>
                        </li>

                        <li class="divider">
                        </li>
                        <!-- <li>
                            <a href="https://hrm.froid.works/screenlock ">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li> -->
                        <li>
                            <a href="#" id="logout-form">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->


<!-- 
<form method="POST" action="https://hrm.froid.works" accept-charset="UTF-8" id="edit_form_leave"><input name="_method" type="hidden" value="PATCH"><input name="_token" type="hidden" value="02xMj5p3FIMvjKR0i8cWU3WVc3vW8nAoTluXXl5M">
<div id="static_leave_requests" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <span class="caption-subject font-red-sunglo bold uppercase">Leave Application</span>
            </div>
            <div class="modal-body" id="modal-data-leave">
                
            </div>
        </div>

    </div>
</div>
</div>
</form> -->


</script>

        <div class="clearfix">
        </div>

<!-- BEGIN CONTAINER -->
<div class="page-container">

         <!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>


            
            <li class="start active">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            


            
            <li class="">
                <a href="Patients.html">
                    <i class="fa fa-users"></i>
                    <span class="title">Patients</span>
                </a>
            </li>
            

            


            
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Settings</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="#">
                            <i class="fa  fa-cog"></i>
                            General Setting</a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            Profile Setting</a>
                    </li>
                    <!-- <li class="">
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            Notification Setting</a>
                    </li> -->

                    <li class="">
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            Email Setting</a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class="fa fa-language"></i>
                            Update Log</a>
                    </li>
                </ul>
            </li>

            

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
     
 <?php
$subject = $_GET['id'];
echo $subject;
?>

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Dashboard
        <small>reports & statistics</small>
    </h3>



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

                </div>
            </div>
        </div>

    </div> 

    
        </div>
        
    </div> -->
    <!-- END CONTENT -->
    
</div>
<!-- END CONTAINER -->


<!--MODAL FOR EDIT/INSERT DATA  -->
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


    <!-- BEGIN FOOTER -->
<div class="page-footer">   
	<div class="page-footer-inner">
		 2019 &copy; DiagnoX
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!-- 
<script src="https://hrm.froid.works/assets/global/plugins/respond.min.js"></script>
<script src="https://hrm.froid.works/assets/global/plugins/excanvas.min.js"></script> -->


<!-- <script src="./assets/global/plugins/jquery.min.js"></script>
<script src="./assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script> -->
<script src="./assets/global/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script src="./assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script src="./assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="./assets/global/plugins/froiden-helper/helper.js"></script>

<script src="./assets/global/scripts/metronic.js"></script>
<script src="./assets/admin/layout/scripts/layout.js"></script> 


<!-- END PAGE LEVEL SCRIPTS -->
<script>
     jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.demo-loading-btn')
            .click(function () {
                var btn = $(this)
                btn.button('loading')
                setTimeout(function () {
                    btn.button('reset')
                }, 8000)
            });
        $('.demo-loading-btn-ajax')
            .click(function () {
                var btn = $(this)
                btn.button('loading')
                setTimeout(function () {
                    btn.button('reset')
                }, 500)
            });


    });

  

    function updateLeaveApplication(id) {

        var url = "https://hrm.froid.works/admin/leave_applications/:id";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'PUT',
            url: url,
            container: '#edit_form_leave',
            data: $('#edit_form_leave').serialize(),
            success: function () {
                window.location.reload();
            }
        });

    }
</script>



</body>
<!-- END BODY -->
</html>




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
    $.notify("Data Updated Successfully!","success",{position:"right middle"});
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