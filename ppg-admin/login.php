<?php
	include "../database.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Login!</title>
	<link rel="stylesheet" href="assets/css/style.css" />
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="teal">

	<div class="container">
		<div class="card" id="login-card">
			<div class="card-content">
			<h4 class="center">Please Enter Your Credentials to Login!</h4>
				<form action="login.php" method="post" autocomplete="off">
					<div class="row">
       					<div class="input-field col s6">
							<input id="email" name="email" type="email" class="validate" required />
							<label for="email">Email Address</label>
							</div>
							<div class="input-field col s6">
							<input id="password" name="password" type="password" class="validate" required />
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col l12 m12">
							<button class="btn col l12 m12 s12" name="login" type="submit">
								Take Me To The Dashboard!
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<?php
	if(isset($_POST['login'])){
		$email = $_SESSION['email'] = $_POST['email'];
		$pass = $_POST['password'];
		$query = "select * from login where email='$email' && password='$pass'";
		$run = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$check = mysqli_num_rows($run);
		if($check == 1){
			echo "<script>window.open('dashboard.php', '_self')</script>";
		} else {
			echo "<script>alert('Your credentials are wrong!')</script>";
			echo "<script>window.open('login.php', '_self')</script>";
		}
	}
?>