<?php include('includes/alert.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fff !important;">
    <li class="breadcrumb-item active" aria-current="page">Hem</li>
    <li class="breadcrumb-item active" aria-current="page">Kontrollpanel</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="dashboard">
  <h1 class="h2">Kontrollpanel</h1>
</div>

<div class="container-fluid" style="margin-bottom:70px;">
    <div class="row">
        <div class="col-sm">
            <div class="shadow card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Användare <span class="float-right" style="width: 32px; height: 32px;" data-feather="user"></span>
                    </h4>
                    <h2 class="mb-5 font-weight-bold">
                        <?php 
                            include('includes/dbh.inc.php');
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo $result->num_rows;
                            }
                            $conn->close();
                        ?>
                    </h2>
                    <h6 class="card-text">Lorem ipsum</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="shadow card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Medier <span class="float-right" style="width: 32px; height: 32px;" data-feather="archive"></span>
                    </h4>
                    <h2 class="mb-5 font-weight-bold">
                        <?php 
                            include('includes/dbh.inc.php');
                            $sql = "SELECT item_id FROM media";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo $result->num_rows;
                            }
                            $conn->close();
                        ?>
                    </h2>
                    <h6 class="card-text">Lorem ipsum</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="shadow card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Lån <span class="float-right" style="width: 32px; height: 32px;" data-feather="eye"></span>
                    </h4>
                    <h2 class="mb-5 font-weight-bold">
                        <?php 
                            include('includes/dbh.inc.php');
                            $sql = "SELECT item_id FROM borrowed";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo $result->num_rows;
                            }
                            $conn->close();
                        ?>
                    </h2>
                    <h6 class="card-text">Lorem ipsum</h6>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-bottom:70px;">
    <div class="row">
        <div class="col-sm">
            <div class="card shadow">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-sm-6">
<h6>Lägg till ett lån:</h6>
  <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addloan.php">
  Välj en användare:<br>
      <select class="selectpicker show-tick" name="user_id" id="user_id" data-live-search="true" data-width="auto">
          <?php
          include('includes/dbh.inc.php');
          $sql = "SELECT user_id, firstname, lastname FROM users";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option value='". $row["user_id"] ."'>". $row["user_id"]." | ". $row["firstname"]." ". $row["lastname"]."</option>";
          }
          echo "</table>";
          } else { echo "0 resultat"; }
          $conn->close();
          ?>
      </select>
      <br><br>
      <p>Start datum (Dagens datum är <?php echo date("Y-m-d");?>):</p>
      <input type="date" name="start_date" id="start_date" value="<?php echo date("Y-m-d");?>"><br><br>

      <p>Serienummer:</p>
      <input type="text" name="item_id" id="item_id" placeholder="00870006044" maxlength="11"><br><br>
      
      <input type="submit" value="Lägg till lån">
      <br><br>
  </form>
</div>

<br>
<br>

<div class="col-sm-6">
  <h6>Avsluta ett lån:</h6>
  <i>Skanna antingen in ett serienummer eller välj en media</i>
      <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/endloan.php">
        <br>
          <p>Serienummer:</p>
          <input type="text" name="item_id" id="item_id" maxlength="11" placeholder="00870006044"><br><br>
          
          <p>Media:</p>
          <select name="item_id" id="item_id" class="selectpicker show-tick" data-live-search="true" data-width="auto">
              <?php
              include('includes/dbh.inc.php');
              $sql = "SELECT item_id, title FROM media WHERE is_borrowed='1'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<option value='". $row["item_id"] ."'>". $row["item_id"]." | ". $row["title"]."</option>";
              }
              echo "</table>";
              } else { echo "0 resultat"; }
              $conn->close();
              ?>
          </select>
          <br>
          <br>

          <input type="submit" value="Avsluta lån">
      </form>
      <br>
      <br>

      <h6>Gör en bokning:</h6>
      <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/reservmedia.php">
          Media:<br>
          <select name="item_id" id="item_id" class="selectpicker show-tick" data-live-search="true" data-width="auto">
              <?php
              include('includes/dbh.inc.php');
              $sql = "SELECT item_id, title FROM media WHERE is_borrowed='1'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<option value='". $row["item_id"] ."'>". $row["item_id"]." | ". $row["title"]."</option>";
              }
              echo "</table>";
              } else { echo "0 resultat"; }
              $conn->close();
              ?>
          </select><br><br>
          
          Välj en användare:<br>
          <select name="user_id" id="user_id" class="selectpicker show-tick" data-live-search="true" data-width="auto">
              <?php
              include('includes/dbh.inc.php');
              $sql = "SELECT user_id, firstname, lastname FROM users";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<option value='". $row["user_id"] ."'>". $row["user_id"]." | ". $row["firstname"]." ". $row["lastname"]."</option>";
              }
              echo "</table>";
              } else { echo "0 resultat"; }
              $conn->close();
              ?>
          </select><br><br>

          <p>Start datum (Dagens datum är <?php echo date("Y-m-d");?>):</p>
          <input type="date" name="start_date" id="start_date" value="<?php echo date("Y-m-d");?>"><br><br>

          <p>Slut datum:</p>
          <input type="date" name="end_date" id="end_date"><br><br>

          <input type="submit" value="Boka">
      </form>
      <br>
      <br>

  </div>
</div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="users">
  <h1 class="h2">Användare</h1>
</div>

<div class="col-md-8">

<div class="container-fluid">
      <div class="row">
          <div class="col-sm-4">
              <h6>Lägg till en användare:</h6>
                      <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/adduser.php">
                          <p>Personnummer:</p>
                          <input type="text" name="user_id" id="user_id" minlength="12" maxlength="12"><br>
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
                      </form><br><br>
          </div>
          <div class="col-sm-4">
              <h6>Ta bort en användare:</h6>
              <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/removeuser.php">
              Välj en användare<br><br>
                  <select name="user_id" id="user_id" class="selectpicker show-tick" data-live-search="true" data-width="75%">
                      <?php
                      include('includes/dbh.inc.php');
                      $sql = "SELECT user_id, firstname, lastname FROM users";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          echo "<option value='". $row["user_id"] ."'>". $row["user_id"]." | ". $row["firstname"]." ". $row["lastname"]."</option>";
                      }
                      echo "</table>";
                      } else { echo "0 resultat"; }
                      $conn->close();
                      ?>
                  </select>
                  <br><br>
                  <input type="submit" value="Ta bort användare">
                  <br><br>
              </form>
          </div>
          <div class="col-sm-4">
              <h6>Användarlista:</h6>
                  <?php
                  include('includes/dbh.inc.php');
                  $sql = "SELECT users.user_id, users.firstname, users.lastname, users.role_id, users.date, roles.role_name FROM users INNER JOIN roles ON users.role_id=roles.role_id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>Personnummer</th><th scope='col'>Namn</th><th scope='col'>Roll</th><th scope='col'>Datum</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["user_id"]. "</td><td scope='row'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td scope='row'>" . $row["role_name"] . "</td><td scope='row'>" . $row["date"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
                  ?>
          </div>
     
      </div>
</div>


</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="media">
  <h1 class="h2">Media</h1>
</div>

<div class="container-fluid">
      <div class="row">
          <div class="col-sm-4">
          <h6>Lägg till media:</h6>
  <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addmedia.php">
      <p>Serienummer:</p>
      <input type="text" name="item_id" id="item_id" maxlength="11"><br>
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
          } else { echo "0 resultat"; }
          $conn->close();
          ?>
      </select>
      <br>
      <br>
      Författare:<br>
      <select name="author_id" id="author_id" multiple>
          <option value="">Inget</option>
          <?php
          include('includes/dbh.inc.php');
          $sql = "SELECT author_id, author_fname,author_lname FROM authors";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option value='". $row["author_id"] ."'>". $row["author_fname"]." ". $row["author_lname"]."</option>";
          }
          echo "</table>";
          } else { echo "0 resultat"; }
          $conn->close();
          ?>
      </select>
      <br>
      <br>
      
      Berättare:

      <select name="narrator_id" id="narrator_id">
          <option value="">Inget</option>
          <?php
          include('includes/dbh.inc.php');
          $sql = "SELECT narrator_id, narrator_fname,narrator_lname FROM narrators";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option value='". $row["narrator_id"] ."'>". $row["narrator_fname"]." ". $row["narrator_lname"]."</option>";
          }
          echo "</table>";
          } else { echo "0 resultat"; }
          $conn->close();
          ?>
      </select>
      <br>
      <br>
      Director:

      <select name="director_id" id="director_id">
      <option value="">Inget</option>
          <?php
          include('includes/dbh.inc.php');
          $sql = "SELECT director_id, director_fname,director_lname FROM directors";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option value='". $row["director_id"] ."'>". $row["director_fname"]." ". $row["director_lname"]."</option>";
          }
          echo "</table>";
          } else { echo "0 resultat"; }
          $conn->close();
          ?>
      </select>
      <br>
      <br>
          Genre
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
                  } else { echo "0 resultat"; }
                  $conn->close();
                  ?>
              </select><br><br>
              <input type="submit" value="Lägg till">
              </form>
          </div>

          <div class="col-sm-4">
              <h6>Lägg till en författare:</h6>
              <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addauthor.php">
                  <p>Förnamn:</p>
                  <input type="text" name="author_fname" id="author_fname"><br>
                  <p>Efternamn:</p>
                  <input type="text" name="author_lname" id="author_lname"><br><br>
                  <input type="submit" value="Lägg till">
              </form>
              <br>
              <h6>Lägg till en regissör:</h6>
              <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/adddirector.php">
                  <p>Förnamn:</p>
                  <input type="text" name="director_fname" id="director_fname"><br>
                  <p>Efternamn:</p>
                  <input type="text" name="director_lname" id="director_lname"><br><br>
                  <input type="submit" value="Lägg till">
              </form>
              <br>
              <h6>Lägg till en berättare:</h6>
              <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addnarrator.php">
                  <p>Förnamn:</p>
                  <input type="text" name="narrator_fname" id="narrator_fname"><br>
                  <p>Efternamn:</p>
                  <input type="text" name="narrator_lname" id="narrator_lname"><br><br>
                  <input type="submit" value="Lägg till">
              </form>
              <br>
              <h6>Lägg till en genre:</h6>
              <form action="http://<?php echo $domain_name ?>/LibrarySystem/includes/addgenre.php">
                  <p>Namn:</p>
                  <input type="text" name="genre_name" id="genre_name"><br><br>
                  <input type="submit" value="Lägg till">
              </form>
          </div>

          <div class="col-sm-4">
          <h6>Författarlista:</h6>
              <?php
                  include('includes/dbh.inc.php');
                  $sql = "SELECT author_id, author_fname, author_lname FROM authors";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>#</th><th scope='col'>Namn</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["author_id"]. "</td><td scope='row'>" . $row["author_fname"]. " " . $row["author_lname"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>

          <h6>Regissörlista:</h6>
              <?php
                  include('includes/dbh.inc.php');
                   $sql = "SELECT director_id, director_fname, director_lname FROM directors";
                  $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>#</th><th scope='col'>Namn</th></tr>";
                  // output data of each row
                   while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["director_id"]. "</td><td scope='row'>" . $row["director_fname"]. " " . $row["director_lname"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>
          <h6>Berättarlista:</h6>
              <?php
                  include('includes/dbh.inc.php');
                  $sql = "SELECT narrator_id, narrator_fname, narrator_lname FROM narrators";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>#</th><th scope='col'>Namn</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["narrator_id"]. "</td><td scope='row'>" . $row["narrator_fname"]. " " . $row["narrator_lname"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>

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
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>
          </div>
      </div>
</div>
<div class="col-md-8">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="archive">
      <h1 class="h2">Arkiv</h1>
  </div>

  <div class="container-fluid">
  <!-- Control the column width, and how they should appear on different devices -->
      <div class="row">
          <div class="col-lg-6">
              <h6>Medialista:</h6>
              <?php
                  include('includes/dbh.inc.php');
                  $sql = "SELECT media.item_id, media.title, media.cat_id, media.genre_id, media.is_borrowed, item_cat.cat_name, genre.genre_name FROM media INNER JOIN item_cat ON media.cat_id=item_cat.cat_id INNER JOIN genre ON media.genre_id=genre.genre_id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>Serienummer</th><th scope='col'>Titel</th><th scope='col'>Kategori</th><th scope='col'>Genre</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["item_id"]. "</td><td scope='row'>" . $row["title"]. "</td><td scope='row'>" . $row["cat_name"]. "</td><td scope='row'>" . $row["genre_name"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>
          </div>
          <div class="col-lg-6">
              <h6>Lånelista:</h6>
              <?php
                  include('includes/dbh.inc.php');
                  $sql = "SELECT borrowed.user_id, borrowed.item_id, borrowed.start_date, borrowed.end_date, users.firstname, users.lastname, media.title FROM borrowed 
                  INNER JOIN users ON borrowed.user_id=users.user_id
                  INNER JOIN media ON borrowed.item_id=media.item_id
                  ";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      echo "<table class='table'><tr><th scope='col'>Lånad av</th><th scope='col'>Serienummer</th><th scope='col'>Titel</th><th scope='col'>Startdatum</th><th scope='col'>Slutdatum</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td scope='row'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td scope='row'>" . $row["item_id"]. "</td><td scope='row'>" . $row["title"]. "</td><td scope='row'>" . $row["start_date"]. "</td><td scope='row'>" . $row["end_date"]. "</td></tr>";
                  }
                  echo "</table>";
                  } else { echo "0 resultat"; }
                  $conn->close();
              ?>
          </div>
      </div>
  </div>