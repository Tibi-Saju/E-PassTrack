<?php
session_start();
include('../includes/dbconnection.php');
$uem=$_SESSION['email'];


                        $sql2="SELECT * from usertable where email='$uem'";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->execute();
                        $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                        // echo $results2->id;
                        if($query2->rowCount() > 0)
                        {
                        foreach($results2 as $row2)
                        {   
                          $uid=$row2->id;
                        }
                      }



$conn=mysqli_connect("localhost","root","","cpms");
$id=0;
$sqlpr = "SELECT id from tblpass";
$result = $conn->query($sqlpr);
if ($result->num_rows == 0)
{
$id=1;	
}
else
{
	$last="SELECT id FROM tblpass ORDER BY id DESC LIMIT 1";
	$lresult = $conn->query($last);
	while($row = $lresult->fetch_assoc())
	{
		$id=$row['id'];
		$id=1+$id;
	}
	
}
 $fname=$_POST['name'];
 $cnum=$_POST['mobile'];
 $email=$_POST['email'];
 $itype=$_POST['identity'];
 $icnum=$_POST['cardnum'];
 $cat=$_POST['category'];
 $destination=$_POST['destination'];
 $fdate=$_POST['fromdt'];
 $tdate=$_POST['todt'];
 $passnum=mt_rand(100000000, 999999999);
 $passcre=date('y-m-d h:m:s');
$conn=mysqli_connect("localhost","root","","cpms");
if($conn)
{
	$q="insert into tblpass values('$id','$passnum','$fname','$cnum','$email','$itype','$icnum','$cat','$destination','$fdate','$tdate','$passcre',$uid)";
	$r=mysqli_query($conn,$q);
	if($r)
	{
		echo "<script>alert('Inserted successfully')</script>";
	}
	else
	{
		echo "<script>alert('unsuccessful insert')</script>";
	}
	header('location: form.php');
}
?>