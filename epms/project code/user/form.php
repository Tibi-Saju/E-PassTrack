<?php
session_start();
$uem=$_SESSION['email'];
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EPASSTRACK | Add Pass</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 

include "./theme/top-menu.php";
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include "./theme/sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Pass</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Pass</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill the details of Travel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="form-p.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail" placeholder="Enter FullName">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="text" name="mobile" class="form-control" maxlength="10" pattern="[0-9]+" id="exampleInputEmail1" placeholder="Enter Contact Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Identity Type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identity Type</label>
                    <select type="text" name="identity" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter Identity Type" required='true'>
                      <option value="">Choose Identity Type</option>
                      <option value="Voter Card">Voter Card</option>
                      <option value="PAN Card">PAN Card</option>
                      <option value="Adhar Card">Adhar Card</option>
                      <option value="Student Card">Student Card</option>
                      <option value="Driving License">Driving License</option>
                      <option value="Passport">Passport</option>
                      <option value="Any Official Card">Any Official Card</option>
                      <option value="Any Other Govt Issued Doc">Any Other Govt Issued Doc</option>
                    </select>  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identity Card Number</label>
                    <input type="text" name="cardnum" class="form-control" id="exampleInputEmail1" placeholder="Enter Identity Type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select type="text" name="category" value="" class="form-control" required='true'>
<?php 

$sql2 = "SELECT * from   tblcategory";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->CategoryName);?>"><?php echo htmlentities($row->CategoryName);?></option>
 <?php } ?>
     </select>
     </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Destination</label>
                    <input type="text" name="destination" class="form-control" id="exampleInputPassword1" placeholder="Destination">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">From Date</label>
                    <input type="text" name="fromdt" class="form-control" id="exampleInputPassword1" placeholder="From Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">To Date</label>
                    <input type="text" name="todt" class="form-control" id="exampleInputPassword1" placeholder="To Date">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Pvt</b> Ltd
    </div>
    <strong>Copyright &copy; 2021-2023 <a href="index.php">E-Passtrack</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        name: true,
      },
      mobile: {
        required: true,
        mobile: true,
      },
      email: {
        required: true,
        email: true,
      },
      identity: {
        required: true,
        identity: true,
      },
      cardnum: {
        required: true,
        cardnum: true,
      },
      category: {
        required: true,
        category: true,
      },
      destination: {
        required: true,
        category: true,
      },
      fromdt: {
        required: true,
        fromdt: true,
      },
      todt: {
        required: true,
        todt: true,
      },
    },
    messages: {
      name: {
        required: "Please enter your full name",
        name: "Please enter a valid name"
      },
      mobile: {
        required: "Please enter your contact number",
        mobile: "Please enter a valid number"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      identity: {
        required: "Please enter your identity type",
        identity: "Please enter a valid identity type"
      },
      cardnum: {
        required: "Please enter your identity card number",
        cardnum: "Please enter a valid identity card number"
      },
      category: {
        required: "Please enter a category",
        category: "Please enter a valid category"
      },
      fromdt: {
        required: "Please enter a date",
        fromdt: "Please enter a valid date"
      }, 
      todt: {
        required: "Please enter a date",
        todt: "Please enter a valid date"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
