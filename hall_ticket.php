<!DOCTYPE html>
<html>
<head>
	<title>Hall Ticket</title>
</head>
<body>
	<?php
		
		include 'assets/backend/connect.php';
		include 'assets/backend/core.php';

		$Sap = $_GET['sap'];
		$query = "SELECT courses from login where sap = '$Sap'";
		$result = mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		 $arrcour=explode(",",$row[0]);

		 $query2 = "SELECT firstname from login where sap = '$Sap'";
		 $result2 = mysqli_query($con,$query2);
		 $row2=mysqli_fetch_array($result2);

		 $query3 = "SELECT surname from login where sap = '$Sap'";
		 $result3 = mysqli_query($con,$query3);
		$row3=mysqli_fetch_array($result3);

		$query4 = "SELECT gender from login where sap = '$Sap'";
		 $result4 = mysqli_query($con,$query4);
		$row4=mysqli_fetch_array($result4);

		$query5 = "SELECT payment from login where sap = '$Sap'";
		 $result5 = mysqli_query($con,$query5);
		$row5=mysqli_fetch_array($result5);


	?>
	<center><p style="font-size: 25px"><b>Dwarkadas J. Sanghvi College Of Engineering</b></p>
			<p>Vile Parle (West), Mumbai-400056.</p>
			<table border="1" cellspacing="0">
				<tr>
					<th>Registration No. 1298129891289</th>
					<th>Admission No.172676767</th>
					<td><b>Sap </b><?php echo $Sap?></td>
				</tr>	
			</table>
<pre style="font-size: 19px"><b>Candidate Name:</b> <?php echo $row2[0]." ".$row3[0]?>       <b>Gender:</b><?php echo $row4[0]?>              <b>Fee:</b> <?php  if($row5[0]==0){echo 'Not Paid';}else{echo'Paid';}?>           </pre>
	
	<table border="1" cellspacing="0" height="100px">
		<tr>
			<th colspan="4">Time Table </th>
		</tr>
		<tr>
			<td>Course</td>
			<td>Date</td>
			<td>Time</td>
			<td>Room No</td>
		</tr>
		<?php
		foreach($arrcour as $cour)
		{
			$query1 = "SELECT doe from courses where name = '$cour'";
			$result1 = mysqli_query($con,$query1);
			$row1=mysqli_fetch_array($result1);

			$query12 = "SELECT roomno from allocation where sap = '".$Sap."' ";
			$result12 = mysqli_query($con,$query12);
			$row12=mysqli_fetch_array($result12);

			if($cour!="")
			{
		?>
		<tr>
			<td><?php echo $cour?></td>
			<td><?php echo $row1[0] ?></td>
			<td>3:00 PM TO 6:00 PM</td>
			<td><?php echo $row12[0] ?></td>
		</tr>
		<?php
			}
		}
		?>
	</table>
	<p></p>
	</center>
</body>
</html>