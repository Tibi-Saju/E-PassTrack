<?php
session_start();
$uem=$_SESSION['email'];
include('../includes/dbconnection.php');
    if(isset($_POST['submit']))
  { 
    $uem=$_SESSION['email'];
    $name=$_POST['name'];
  $email=$_POST['email'];
  $sql="update usertable set name=:name,email=:email where email=:uem";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$name,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':uem',$uem,PDO::PARAM_STR);
$query->execute();
  echo '<script>alert("Profile has been updated.")</script>';
     
    
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EPASSTRACK | Profile Edit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post"> 
                                    <?php

$sql2="SELECT * from usertable where email='$uem'";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
// echo $results2->id;
$cnt=1;
if($query2->rowCount() > 0)
{
foreach($results2 as $row2)
{   

?>
    <div class="form-group"> <label style="padding-left: 20px" for="exampleInputEmail1">ID Number</label> <input style="padding-left: 20px" type="text" name="" value="<?php  echo $row2->id;?>" class="form-control" readonly=""> </div>
    <div class="form-group"> <label style="padding-left: 20px" for="exampleInputEmail1">User Name</label> <input style="padding-left: 20px" type="text" name="name" value="<?php  echo $row2->name;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label style="padding-left: 20px" for="exampleInputEmail1">Email address</label> <input style="padding-left: 20px" type="email" name="email" value="<?php  echo $row2->email;?>" class="form-control" required='true'> </div> 
    <div class="form-group"> <label style="padding-left: 20px" for="exampleInputEmail1">Status</label> <input style="padding-left: 20px" type="text" name="" value="<?php  echo $row2->status;?>" readonly="" class="form-control" > </div> 
   <?php $cnt=$cnt+1;}} ?> 
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button></p> </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
