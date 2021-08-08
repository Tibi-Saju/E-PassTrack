<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<?php
$duid=$_GET['deleteuid'];
$sql2="DELETE from  usertable where id=$duid";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
if($query2)
	{
		echo "<script>alert('Deleted successfully')</script>";
	}
	else
	{
		echo "<script>alert('unsuccessful Deletion')</script>";
	}
    header('location: manage-user.php');
?>
<?php } ?>