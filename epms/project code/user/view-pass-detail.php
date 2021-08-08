<?php 
session_start();
$uem=$_SESSION['email'];
include('../includes/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EPASSTRACK | Contact Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
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
            <h1>View Pass</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Pass</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="panel panel-default">
                       
                       <div class="panel-body">
                           <div class="row" id="divToPrint">
                               <div class="col-lg-12">
                                  <?php
$vid=$_GET['viewid'];
$sql2="SELECT * from  tblpass where id=$vid";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query2->rowCount() > 0)
{
foreach($results2 as $row2)
{               ?>
                                   <table border="1" class="table table-bordered" > 
                                   <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
Pass ID: <?php  echo ($row2->PassNumber);?></td></tr>
  <tr>
       <th scope>Category</th>
   <td><?php  echo ($row2->Category);?></td>
   <th scope>Destination</th>
   <td><?php  echo ($row2->destination);?></td> 
 </tr>

 <tr>
   <th scope>Full Name</th>
   <td colspan="3"><?php  echo ($row2->FullName);?></td>
 </tr>

 <tr>
   <th scope>Mobile Number</th>
   <td><?php  echo ($row2->ContactNumber);?></td>
   <th scope>Email</th>
   <td><?php  echo ($row2->Email);?></td>
 </tr>
<tr>
   <th scope>Identity Type</th>
   <td><?php  echo ($row2->IdentityType);?></td>
   <th scope>Identity Card Number</th>
   <td><?php  echo ($row2->IdentityCardno);?></td>

 </tr>
<tr>
   <th scope>From Date</th>
   <td><?php  echo ($row2->FromDate);?></td>
   <th scope>To Date</th>
   <td><?php  echo ($row2->ToDate);?></td>
 </tr>
 <tr>
   <th scope>Pass Creation Date</th>
   <td colspan="3"><?php  echo ($row2->PasscreationDate);?></td>
 </tr>
                                   
  <?php $cnt=$cnt+1;}} ?>
  </table>
  <p style="text-align: center;font-size: 20px;color: red">
 <input type="button" value="print" onclick="PrintDiv();" /></p>
   
                               </div>
                               
                           </div>
                       </div>
                   </div>
     

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
