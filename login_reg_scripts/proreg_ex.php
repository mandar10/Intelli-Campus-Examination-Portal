<?php
include '../assets/backend/connect.php';
include '../assets/backend/core.php';
include '../methods/methods.php';
@$referer1=$_SERVER['HTTP_REFERER'];
?>

<html>
<Head>
	<meta charset="UTF-8">
	<title>
		Register
	</title>
</head>	
<?php 

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

	$url='../profile.php?id='.$user_id;
	echo '<script type="text/javascript">';
	echo 'window.location.href="'.$url.'";';
	echo '</script>';

}
else
{
	//echo'<script>alert("hello");</script>';
	$http_client_ip=@$_SERVER['HTTP_CLIENT_IP'];
	$http_x_forwarded_for= @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote_addr= $_SERVER['REMOTE_ADDR'];

	if(!empty($http_client_ip)){
		$ip=$http_client_ip;
	}else if(!empty($http_x_forwarded_for)) {
		$ip=$http_x_forwarded_for;
	}else{
		$ip=$remote_addr;
	}
	if(
		isset($_POST['firstname1']) &&
		isset($_POST['surname1']) &&
		isset($_POST['password1']) &&
		isset($_POST['password2']) &&
		isset($_POST['email1'])
		)
		{
			$firstname=htmlentities(ucfirst($_POST['firstname1']));
			$lastname=htmlentities(ucfirst($_POST['surname1']));
			$password=md5($_POST['password1']);
			$password1=md5($_POST['password2']);
			$email=htmlentities($_POST['email1']);
			$course=htmlentities($_POST['course']);
			if(!empty($firstname) && !empty($lastname) && !empty($password) && !empty($email) )
			{

				if($password==$password1)
				{
					$query="SELECT * FROM examiner WHERE email='".mysqli_real_escape_string($con,$email) ."'";
					$query_run=mysqli_query($con,$query);
					$query_num=mysqli_num_rows($query_run);
					if($query_num>=1)
					{
						echo '<div id="register"><center><b style="color:red;">This Email Already Exists</b></center></div>';
					}
					else
					{
						$get=mysqli_query($con,"SELECT * FROM examiner ORDER BY id DESC LIMIT 1");
						$got=mysqli_fetch_array($get);
						$curr_id=$got['id'];
						$next_id=80003160000+$curr_id+1;
						$query="INSERT INTO examiner VALUES('','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$lastname)."','".mysqli_real_escape_string($con,$password)."','".mysqli_real_escape_string($con,$email)."','".$next_id."','".$course."')";

						if($query_run=mysqli_query($con,$query))
						{

							echo '<script type="text/javascript">';
							echo 'window.location.href="../login.php?redirect=reg"';
							echo '</script>';
							echo '<div id="register"><center><b style="color:red;">You Have Registered</b></center></div><br>';		  
						}
						else
						{
							echo mysqli_error($con);
						}
					}
				}
				else
				{
					echo '<div id="register"><center><b style="color:red;">Both Password Doesn\'t Match</b></center></div><br>';
				}
			}else
			{
				echo '<div id="register"><center><b style="color:red;">All Details are Mandatory</b></center></div><br>';
			}
		}
		else
		{
			echo '<div id="register"><center><b style="color:red;">Please Fill the Details</b></center></div><br>';
		}
}
?>

</html>
