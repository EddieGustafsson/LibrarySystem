<?php include('includes/alert.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fff !important;">
    <li class="breadcrumb-item"><a href="index.php?page=home">Hem</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gör en bokning</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="dashboard">
  <h1 class="h2">Gör en bokning</h1>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm" style="text-align: center;">
        
        <form action="includes/add.php" method="POST">

            <input type="hidden" name="function" value="addLoan">

            <div style="margin-bottom:20px;">
                <h4>1. Välj en användare</h4>
                <i>Välj en användare nedan</i>
                    <div style="margin-top:20px;">
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
                    </div>
            </div>
        </div>
        <div class="col-sm" style="text-align: center;">
            <div style="margin-bottom:20px;">
                <h4>2. Välj media</h4>
                <i>Skanna eller skriv in ett serienummer nedan</i>
            </div>
            
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

        </div>
        <div class="col-sm" style="text-align: center;">
            <div style="margin-bottom:20px;">
                <h4>3. Välj datum</h4>
                <i>Välj bokningens datum</i>
            </div>
            
            <p>Start datum (Dagens datum är <?php echo date("Y-m-d");?>):</p>
            <input type="date" name="start_date" id="start_date" value="<?php echo date("Y-m-d");?>"><br><br>

            <p>Slut datum:</p>
            <input type="date" name="end_date" id="end_date"><br><br>

        </div>
        <div class="col-sm" style="text-align: center;">
            <div style="margin-bottom:20px;">
                <h4>4. Slutför bokning</h4>
                <i>Klicka på knappen nedan för att slutföra bokningen</i>
            </div>
            <input  value="Lägg till bokning" type="submit" class="btn btn-primary btn-lg">

            </form>
        </div>
    </div>
</div>