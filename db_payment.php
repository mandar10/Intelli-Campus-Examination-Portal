<?php
include 'assets/backend/connect.php';
include 'assets/backend/core.php';
 $courses="";

 if(isset($_GET["courses0"]))
 {
 	$courses=$courses.$_GET["courses0"].",";
 }

  if(isset($_GET["courses1"]))
 {
 	$courses=$courses.$_GET["courses1"].",";
 }

  if(isset($_GET["courses2"]))
 {
 	$courses=$courses.$_GET["courses2"].",";
 }
  if(isset($_GET["courses3"]))
 {
 	$courses=$courses.$_GET["courses3"].",";
 }
  if(isset($_GET["courses4"]))
 {
 	$courses=$courses.$_GET["courses4"].",";
 }
  if(isset($_GET["courses5"]))
 {
 	$courses=$courses.$_GET["courses5"].",";
 }
  if(isset($_GET["courses6"]))
 {
 	$courses=$courses.$_GET["courses6"].",";
 }
  if(isset($_GET["courses7"]))
 {
 	$courses=$courses.$_GET["courses7"];
 }
 	echo $courses;
 	$query = "UPDATE login set courses='$courses' Where sap='".$_SESSION['sap']."' ";
 	$result1=mysqli_query($con,$query);
              echo 'Allocation done successfully';
              echo '<script type="text/javascript">';
              echo 'window.location.href="payment.php";';
              echo '</script>';
?>