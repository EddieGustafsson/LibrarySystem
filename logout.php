<?php
   include ('includes/settings.php');
   session_start();
   unset($_SESSION["login_user"]);
   session_destroy();

   header('Refresh: 2; URL = login.php');
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
      <h1 class="h3 mb-3 font-weight-normal">Loggar ut...</h1>
      <p class="mb-3 text-muted">Du loggas nu ut från ditt konot</p>
    </form>
  </body>
</html>
