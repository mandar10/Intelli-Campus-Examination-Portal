<?php
include 'all.php';
$day=array('2018-02-1','2018-02-8','2018-02-15','2018-02-22');
foreach($day as $iday)
{
	$query="SELECT * FROM invig ";
	$query_run=mysqli_query($con,$query);
	$seta=array(0,0,0,0,0,0,0,0,0,0,0,0);
	while($row=mysqli_fetch_assoc($query_run))
	{
		$sap=$row['sap'];
		$roomno=rand(1,12);
		$query1="INSERT INTO invig_allocation VALUES('','".$sap."','".$iday."','".$roomno."')";
		$query_run1=mysqli_query($con,$query1);
	}

}

              echo 'Allocation done successfully';
              echo '<script type="text/javascript">';
              echo 'window.location.href="admin.php?redirect=true";';
              echo '</script>';
?>