<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    if(substr($_SESSION['sap'],0,1)=='6')
    {
      $user_id=$_SESSION['user_id'];
      $query="SELECT * FROM login WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
      $firstname=$rows["firstname"];
      $surname=$rows["surname"];
      $email=$rows["email"];  
    }
    else if(substr($_SESSION['sap'],0,1)=='7')
    {
      $user_id=$_SESSION['user_id'];
      $query="SELECT * FROM invig WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
      $firstname=$rows["firstname"];
      $surname=$rows["lastname"];
      $email=$rows["email"];
    }
    else
    {
      $user_id=$_SESSION['user_id'];
      $query="SELECT * FROM examiner WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
      $firstname=$rows["firstname"];
      $surname=$rows["lastname"];
      $email=$rows["email"]; 
    }

    
  }


?>
