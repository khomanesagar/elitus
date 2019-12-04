<?php

session_start();
$message="";
if(count($_POST)>0) { //die($_POST["username"].' - '. $_POST["pass"]);
    $con = new mysqli("166.62.124.87:3306","ppin_pcity","ppin_pcity","ppin_elitus");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $result = mysqli_query($con,"SELECT * FROM login WHERE username='" . $_POST["username"] . "' and password = '". $_POST["pass"]."'");    
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
		$_SESSION["id"] = $row['id'];
		$_SESSION["name"] = $row['username'];
	} else {
        $message = "Invalid Username or Password!";
	}
    if(isset($_SESSION["id"])) { 
        header("Location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Elitus</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<!--	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">-->
<!--===============================================================================================-->	
<!--	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<div class="msg"><?php echo $message; ?></div>
				<form class="login100-form validate-form" action="" method = "POST">
					<span class="login100-form-logo">
						<img class="manImg" src="images/logo.png" style="border-radius: 30px;">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">						
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn" >Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<!--<script src="vendor/jquery/jquery-3.2.1.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="vendor/animsition/js/animsition.min.js"></script>-->
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<!--<script src="vendor/select2/select2.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="vendor/daterangepicker/moment.min.js"></script>-->
	<!--<script src="vendor/daterangepicker/daterangepicker.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="vendor/countdowntime/countdowntime.js"></script>-->
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>