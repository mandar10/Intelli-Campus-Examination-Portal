<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
    $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "college";

  $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    //echo "connected successfully";
    $Dept = 'IT';
     $query = "SELECT name from courses WHERE dept = '$Dept' ";
     $result1=mysqli_query($conn,$query);
      


  ?>

<div class="container">
  <h2>Form control: checkbox</h2>
  <p>The form below contains three checkboxes:</p>
  <form method="get" action="db_payment.php">
          <?php 
              $i=0;
              while($row1=mysqli_fetch_array($result1))
              {?>
                 <input type="checkbox" name="courses<?php echo $i;?>" value="<?php echo $row1[0] ?>"> <?php echo $row1[0] ?> <br>
                <?php
                $i++;
              }
               ?> 
           <input type="submit" class="btn" name="submit">    
    </div>
  </form>
</div>

</body>
</html>
