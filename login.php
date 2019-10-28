<?php 
   include ('includes/dbh.inc.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $persnr = mysqli_real_escape_string($conn,$_POST['inputPersnr']);
      
      $sql = "SELECT user_id FROM users WHERE user_id = '$persnr' AND role_id='5' OR role_id='4'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_user'] = $persnr;
         header("location: index.php");
      }else {
         $error = "Your Code is wrong is invalid";
         header("location: ./index.php?userLogin=Error?reason=NotAdmin");
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTI Gymnasiet - Bibliotek</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/js/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/js/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="assets/js/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/js/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/js/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="assets/js/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/bg-02.jpg');">
			<div class="wrap-login100">
				<form action="includes/login.inc.php" method="post" class="login100-form validate-form">
					<span>
						<img style="display: block; margin-left: auto; margin-right: auto;" width="70%" height="70%" src="assets/img/nti_logo_white.svg">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
          Logga in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Skriv in ditt användarnamn">
						<input class="input100" type="text" name="username" placeholder="Användarnamn">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Skriv in ditt lösenord">
						<input class="input100" type="password" name="pass" placeholder="Lösenord">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
            Kom ihåg mig
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
            Logga in
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
            Glömt ditt lösenord?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="assets/js/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/js/animsition/js/animsition.min.js"></script>
	<script src="assets/js/bootstrap/js/popper.js"></script>
	<script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>
	<script src="assets/js/daterangepicker/moment.min.js"></script>
	<script src="assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="assets/js/countdowntime/countdowntime.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>