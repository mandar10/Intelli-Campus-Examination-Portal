<div class="content-wrapper" style="" >
  <div class="row" style="margin:0 3%;">
    <?php
    include '../assets/backend/connect.php';
    include '../assets/backend/core.php';
    include '../methods/methods.php';
    if(isset($_POST['email']) && isset($_POST['password']))
    {

     $email=$_POST['email'];
     $password=$_POST['password'];
     $password_hash=md5($password);
     $type=$_POST['type'];
     $colno=0;
     if(!empty($email) && !empty($password))
     {
       if($type=='S')
       {
          $query="SELECT id,email,sap FROM login WHERE sap='".mysqli_real_escape_string($con,$email)."' AND password='".mysqli_real_escape_string($con,$password_hash)."'";
          $colno=16;
       }
       else if($type=='I')
       {
          $query="SELECT id,email,sap FROM invig WHERE sap='".mysqli_real_escape_string($con,$email)."' AND password='".mysqli_real_escape_string($con,$password_hash)."'";
          $colno=3;
       }
       else
       {
          $query="SELECT id,email,sap FROM examiner WHERE sap='".mysqli_real_escape_string($con,$email)."' AND password='".mysqli_real_escape_string($con,$password_hash)."'";        
          $colno=5;
       }

       if($query_run=mysqli_query($con,$query))
       {
         $query_num=mysqli_num_rows($query_run);
         $row=mysqli_fetch_assoc($query_run);
         if($query_num==0)
         {
           echo '<script type="text/javascript">';
           echo 'window.location.href="../login.php#error";';
           echo '</script>';
         }
         else
         {
            @$http_client_ip=$_SERVER['HTTP_CLIENT_IP'];
            @$http_x_forwarded_for= $_SERVER['HTTP_X_FORWARDED_FOR'];
            @$remote_addr= $_SERVER['REMOTE_ADDR'];

            if(!empty($http_client_ip))
            {
              $ip=$http_client_ip;

            }else if(!empty($http_x_forwarded_for)) {
              $ip=$http_x_forwarded_for;
            }else{
              $ip=$remote_addr;
            }
            $user_id=mysqli_result($query_run,0,'id');
            $sap=$row["sap"];
          date_default_timezone_set("Asia/Kolkata");
     	           
            $datetime=date("y/m/d h:i:s"); //create date time
            $url="../login.php";
            
            if($type=='S')
            {
            $sql="UPDATE login SET lastlog='$datetime',ip='abc' WHERE id='$user_id'";
            $sql_run=mysqli_query($con,$sql);
            }

            $_SESSION['user_id']=$user_id;
            $_SESSION['sap']=$sap;
            if(isset($_SESSION['user_id']))
            {
              echo '<script type="text/javascript">';
              echo 'window.location.href="'.$url.'";';
              echo '</script>';
            }
         }
         }
         else
         {
          echo '<b>Note-:</b><span style="color:red;">&nbspInvalid Details</span>';
          echo '<script type="text/javascript">';
          echo 'window.location.href="../login.php#error1";';
          echo '</script>';
        }
      }
      else
      {
        echo '<b>Note-:</b><span style="color:red;">&nbspEnter the details</span>';
        echo '<script type="text/javascript">';
        echo 'window.location.href="../login.php#error2";';
        echo '</script>';
      }
    }

    ?>
  </div>
</div>

<?php
include '../footer.php';
?>
