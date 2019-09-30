<?php 
   include ('includes/dbh.inc.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $persnr = mysqli_real_escape_string($conn,$_POST['inputPersnr']);
      
      $sql = "SELECT user_id FROM users WHERE user_id = '$persnr' AND role_id='5'";
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="http://<?php echo $domain_name ?>/LibrarySystem/assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action = "" method = "post">
      <h1 class="h3 mb-3 font-weight-normal">Logga in till ditt konto</h1>
      <label for="inputEmail" class="sr-only" >Personnummer</label>
      <input type="password" id="inputPersnr" name="inputPersnr" class="form-control" placeholder="20001212XXXX" maxlength="12" required autofocus>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Logga in</button>
      <p class="mt-5 mb-3 text-muted"><?php include ('includes/settings.php'); echo $login_footer?></p>
    </form>
  </body>
</html>
