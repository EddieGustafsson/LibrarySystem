<?php 
include 'includes/settings.php';
session_start();

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>

    <title><?php echo $site_name ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Custom styles for this template -->
    <link href="http://<?php echo $domain_name ?>/LibrarySystem/assets/css/dashboard.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="?page=home"><?php echo $site_name ?></a>
        <div class="md-form mt-0">
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <form class="form-inline my-2 my-lg-0" action="http://<?php echo $domain_name ?>/LibrarySystem/logout.php">
            <button class="btn btn-outline-light" type="submit">Logga ut</button>
        </form>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="shadow p-3 mb-5 bg-white rounded col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="?page=home">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#user_collapse" id="navbarDropdownMenuLink" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="users"></span>
                    Användare
                </a>
                <div class="panel-collapse collapse" id="user_collapse" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?page=addloan"><span data-feather="arrow-right"></span> Gör ett lån</a>
                    <a class="dropdown-item" href="?page=endloan"><span data-feather="arrow-right"></span> Avsluta ett lån</a>
                    <a class="dropdown-item" href="?page=reservmedia"><span data-feather="arrow-right"></span> Gör en bokning</a>
                </div>
            </li>
              <li class="nav-item">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#media_collapse" id="navbarDropdownMenuLink" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="layers"></span>
                    Media
                </a>
                <div class="panel-collapse collapse" id="media_collapse" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lägg till media</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lägg till en författare</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lägg till en regissör</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lägg till en berättare</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lägg till en genre</a>
                </div>
              </li>
              <li class="nav-item">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#archive_collapse" id="navbarDropdownMenuLink" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="archive"></span>
                    Arkiv
                </a>
                <div class="panel-collapse collapse" id="archive_collapse" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Medialista</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Lånelista</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Författarlista</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Regissörlista</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Berättarlista</a>
                    <a class="dropdown-item" href="?page=home"><span data-feather="arrow-right"></span> Genrelista</a>
                </div>
              </li>
            </ul> <br>
            <div class="border-top">
                <br>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <h6>Information</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="clock"></span>
                            <?php echo date("H:i");?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="calendar"></span>
                            <?php echo date("Y-m-d");?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                        Användare: 
                            <?php 
                            include('includes/dbh.inc.php');
                            $sql = "SELECT user_id, firstname, lastname FROM users";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo $result->num_rows;
                            }
                            $conn->close();
                            ?>st
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="archive"></span>
                        Medier: 
                            <?php 
                                include('includes/dbh.inc.php');
                                $sql = "SELECT item_id FROM media";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo $result->num_rows;
                                }
                                $conn->close();
                            ?>st
                        </a>
                    </li>
                </ul>
            </div>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <?php

            if(isset($_GET['page'])){
                switch ($_GET['page']) {
                    case 'home':
                        include('page/firstpage.php'); 
                        break;
                    case 'addloan':
                        include('page/addloan.php'); 
                        break;
                    case 'endloan':
                        include('page/endloan.php');
                        break;
                    case 'reservmedia':
                          include('page/reservmedia.php');
                          break;
                    default:
                        include('page/firstpage.php'); 
                }
            } else {
                include('page/firstpage.php'); 
            }

            ?>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>