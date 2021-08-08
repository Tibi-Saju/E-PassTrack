<?php
session_start();
$uem=$_SESSION['email'];
include('../includes/dbconnection.php');

$did=$_GET['deleteid'];
$sql="DELETE from  tblpass where ID=$did";
$query = $dbh -> prepare($sql);
$query->execute();
if($query)
	{
		echo "<script>alert('Deleted successfully')</script>";
	}
	else
	{
		echo "<script>alert('unsuccessful Deletion')</script>";
	}
    header('location: manage-pass.php');
?>