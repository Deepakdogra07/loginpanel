<?php
session_start();
include'db.php';
$token = $_GET['token'];
// echo $token;
// echo $_SERVER['PHP_SELF'].'?token='.$token;
// die;

if (isset($_POST['submit'])) {
   
  
    // if (isset($_POST['submit'])) {
    //     echo "hello";
    // die;
    // }
    if (isset($token)) {
        
       
    $query = "SELECT * FROM user WHERE token = '$token' LIMIT 1";
    
    $result = mysqli_query($con,$query);
   
    $password = mysqli_real_escape_string($con ,$_POST['password']);
    $c_password = mysqli_real_escape_string($con ,$_POST['c_password']);
    $newtoken = bin2hex(random_bytes(15));
 if (mysqli_num_rows($result) > 0) {
    if(empty($password))
    {
        echo "Password cannot be Empty";
    }
    else{
    if($password == $c_password)
    {
       
    $update_query= "UPDATE user SET password = '$password' WHERE token = '$token'";
 
    $update_query_run=mysqli_query($con,$update_query);
    
    if ($update_query_run) {
        
        $token_query = "UPDATE user SET token = '$newtoken' WHERE token = '$token'";
        $token_query_run=mysqli_query($con,$token_query);
        header('location:index.php');
    
    }
    else{
        echo "Password cannot be Empty";
        // exit(0);
    }
    }
    else{
        echo "Password Mismatched";
        // exit(0);
    
    }
    }
    }
    
    }
    else{
        echo "Token cannot be Empty";
        // exit(0);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Change Password </title>
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
					<h2 class="heading-section">Password Updation</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
						<form action="<?php echo $_SERVER['PHP_SELF'].'?token='.$token;?>" class="login-form" method= "post">
							
		      		
	            <div class="form-group d-flex">
	              <input type="password" name= "password"class="form-control rounded-left" placeholder="Enter Password" required>
	            </div>
                <div class="form-group d-flex">
	              <input type="password" name= "c_password"class="form-control rounded-left" placeholder="Confirm Password" required>
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" name="submit" class="btn btn-danger rounded submit p-3 px-5">Change Password</button>
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

	
<?php


?>
</body>
</html>