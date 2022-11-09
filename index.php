<?php
session_start();
include 'db.php';
if (isset($_POST['submit'])) {
   

$email=$_POST['username'];
$password=$_POST['password'];

    $query="SELECT *
            FROM user
          WHERE email='$email' LIMIT 1";

$email_run=mysqli_query($con,$query);
if($email_run>0)
{
	$fetch_password = mysqli_fetch_array($email_run);
	$password_db = $fetch_password['password'];
	if($password ==$password_db  )
	{
		if(isset($_POST['remember'])){
			header('location: welcome.php');
			   setcookie('emailcookie',$mail,time()+86400*10);
			   setcookie('passwordcookie',$password,time()+86400*10);
		  }
		  else{
		header('location:welcome.php');

		  }
	}
	else{
		echo "Something went Wrong";
		header('location:index.php');
	}
}
}
?>






<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">User Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>

		      	<h5 class="text-center mb-4"> <?php $_SESSION['msg'];?></h5>
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" class="login-form" method= "post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="username" value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie']; } ?>" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie']; } ?>" name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
						<input type="checkbox" name="remember" id="remember" />
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="forgotpass.php">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

