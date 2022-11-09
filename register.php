<?php
session_start();
include 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
if (isset($_POST['submit'])) {
	
$email =  mysqli_real_escape_string($con , $_POST['email']);

$username = mysqli_real_escape_string($con , $_POST['username']);
$password =  mysqli_real_escape_string($con , $_POST['password']);
// $pass = password_hash($password, PASSWORD_DEFAULT);
$token = bin2hex(random_bytes(15));


$emailquery = "SELECT * FROM user where email = '$email'";
$query= mysqli_query($con , $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{
	echo "USER ALREADY EXISTS";
}
else
{
	$insertquery = "INSERT INTO user(name, email, password,token,status) VALUES ('$username', '$email' , 
									'$password' , '$token' , 'inactive')";

	$insertedquery = mysqli_query($con,$insertquery);
	
	if ($insertedquery) {
		try {
			// $mail->SMTPDebug = 587;                                       
			$mail->isSMTP();                                            
			$mail->Host       = 'smtp.gmail.com';                    
			$mail->SMTPAuth   = true;                             
			$mail->Username   = 'deepak.mind2web@gmail.com';                 
			$mail->Password   = 'pmqjwupmyccvvvym';                        
			$mail->SMTPSecure = 'tls';                              
			$mail->Port       = 587;  
		  
			$mail->setFrom('deepak.mind2web@gmail.com', 'deepak');           
			$mail->addAddress($email);
			   
			$mail->isHTML(true);                                  
			$mail->Subject = 'Email Activation';
			$mail->Body    = 'Hi '.$username.'Please Click On this Link For Email Activation 
			http://localhost/login/activate.php?token='.$token;
			$mail->send();
			$_SESSION['msg'] = "Mail has been sent successfully to ".$email;
			header('location:index.php');
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		  

	}
	else
	{
			?>
		<script type="text/javascript">
			alert('No insertion ');
		</script>
		<?php
	}
}




}



?>






<!doctype html>
<html lang="en">
  <head>
  	<title>Register User </title>
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
					<h2 class="heading-section">Register User</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" class="login-form" method= "post">
							
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Enter your Email" name= "email"required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" name= "username" class="form-control rounded-left" placeholder="Enter your username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name= "password"class="form-control rounded-left" placeholder="Enter Password" required>
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5">Register User</button>
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

