<!DOCTYPE html>
<html lang="en">
<head  >
	<title>Login</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">

</head>
<body>

<?php
require('db.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con,$password);
	$query = "SELECT * FROM `canditates` WHERE username = '$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	
	if($rows == 1){
		$response=array("status"=>"1","message"=>"login successful");
		$_SESSION['username'] = $username;
		echo($response);
		$row2 = mysqli_fetch_array($result);
		header("Location: index.php");
		
	}
	else{
		echo " <script>alert('Username/password is incorrect');
		window.location.replace('login.php');</script> ";
	}
	
}
else{ ?>

<div class="limiter" >
		<div class="container-login100" >
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post" name="login">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
						</br></br><br>
						<a class="txt2" href="forget.php">
							Forget your Password
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
						</br></br>
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

					</br>
					</br>
				</form>
			</div>
		</div>
	</div>
	
	


	<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="Login_v1/vendor/select2/select2.min.js"></script>
	<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="Login_v1/js/main.js"></script>


				
	<?php } ?>
</body>
</html>
