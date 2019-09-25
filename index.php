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
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo $site_name ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="http://<?php echo $domain_name ?>/LibrarySystem/assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo $site_name ?></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a href = "logout.php">Logga ut</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>Dashboard<span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Användare
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Media
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Test4
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Test5
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Test6
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
                <div>

                </div>
          </div>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Användare</h1>
          </div>

          <div class="col-md-8">
            <h6>Lägg till en användare:</h6>
            <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/adduser.php">
                <p>Personnummer:</p>
                <input type="text" name="user_id" id="user_id"><br>
                <p>Förnamn:</p>
                <input type="text" name="firstName" id="firstName"><br>
                <p>Efternamn:</p>
                <input type="text" name="lastName" id="lastName"><br><br>
                Typ:
                <select name="role_id" id="role_id">
                    <option value="4">Admin</option>
                    <option value="5">Lärare</option>
                    <option value="6">Elev</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Lägg till">
            </form>
            <br>
            <h6>Användarlista:</h6>
                <?php
                include('includes/dbh.inc.php');
                $sql = "SELECT user_id, firstname, lastname, role_id,date FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table class='table'><tr><th scope='col'>Personnummer</th><th scope='col'>Namn</th><th scope='col'>Roll ID</th><th scope='col'>Datum</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td scope='row'>" . $row["user_id"]. "</td><td scope='row'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td scope='row'>" . $row["role_id"]. "</td><td scope='row'>" . $row["date"]. "</td></tr>";
                }
                echo "</table>";
                } else { echo "0 results"; }
                $conn->close();
                ?>
          </div>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Media</h1>
          </div>

          <div class="col-md-8">
            <h6>Lägg till media:</h6>
            <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addmedia.php">
                <p>ID:</p>
                <input type="text" name="item_id" id="item_id"><br>
                <p>Titel:</p>
                <input type="text" name="title" id="title"><br><br>
                Kategori:
                <select name="cat_id" id="cat_id">
                    <?php
                    include('includes/dbh.inc.php');
                    $sql = "SELECT cat_id, cat_name FROM item_cat";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='". $row["cat_id"] ."'>". $row["cat_name"]."</option>";
                    }
                    echo "</table>";
                    } else { echo "0 results"; }
                    $conn->close();
                    ?>
                </select>
                <br>
                <br>
                Genre:
                <select name="genre_id" id="genre_id">
                    <?php
                    include('includes/dbh.inc.php');
                    $sql = "SELECT genre_id, genre_name FROM genre";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='". $row["genre_id"] ."'>". $row["genre_name"]."</option>";
                    }
                    echo "</table>";
                    } else { echo "0 results"; }
                    $conn->close();
                    ?>
                </select>
                <br>
                <br>
                <input type="submit" value="Lägg till">
            </form>
            <br>

            <h6>Lägg till en genre:</h6>
            <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addgenre.php">
                <p>Namn:</p>
                <input type="text" name="genre_name" id="genre_name"><br><br>
                <input type="submit" value="Lägg till">
            </form>
            <br>

            <h6>Genrelista:</h6>
                <?php
                include('includes/dbh.inc.php');
                $sql = "SELECT genre_id, genre_name FROM genre";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table class='table'><tr><th scope='col'>#</th><th scope='col'>Namn</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td scope='row'>" . $row["genre_id"]. "</td><td scope='row'>" . $row["genre_name"]. "</td></tr>";
                }
                echo "</table>";
                } else { echo "0 results"; }
                $conn->close();
                ?>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>