<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>E- Pass Management System | View- User</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

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

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">User Details</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="divToPrint">
                                <div class="col-lg-12">
                                   <?php
$vuid=$_GET['viewuid'];
$sql2="SELECT * from  usertable where id=$vuid";
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
 User ID: <?php  echo ($row2->id);?></td></tr>

  <tr>
    <th scope>Full Name</th>
    <td colspan="3"><?php  echo ($row2->name);?></td>
  </tr>

  <tr>

    <th scope>Email</th>
    <td  colspan="3"><?php  echo ($row2->email);?></td>
  </tr>
<tr>
    <th scope>Status</th>
    <td colspan="3"><?php  echo ($row2->status);?></td>
  </tr>                                   
   <?php $cnt=$cnt+1;}} ?>
   </table>
   <p style="text-align: center;font-size: 20px;color: red">
  <input type="button" value="print" onclick="PrintDiv();" /></p>
    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
<?php }  ?>