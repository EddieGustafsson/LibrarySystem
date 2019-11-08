<?php include('includes/alert.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fff !important;">
    <li class="breadcrumb-item"><a href="index.php?page=home">Hem</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gör ett lån</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="dashboard">
  <h1 class="h2">Gör ett lån</h1>
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
            <div class="input-group mb-3">
                <input type="text" name="item_id" class="form-control" placeholder="00870006044" maxlength="11" aria-label="item_id" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-sm" style="text-align: center;">
            <div style="margin-bottom:20px;">
                <h4>3. Slutför lånet</h4>
                <i>Klicka på knappen nedan för att slutföra lånet</i>
            </div>
            <input  value="Lägg till lån" type="submit" class="btn btn-primary btn-lg">

            </form>
        </div>
    </div>
</div>