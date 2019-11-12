<?php include('includes/alert.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fff !important;">
    <li class="breadcrumb-item"><a href="index.php?page=home">Hem</a></li>
    <li class="breadcrumb-item active" aria-current="page">Avsluta ett lån</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom" id="dashboard">
  <h1 class="h2">Avsluta ett lån</h1>
</div>


<div class="container-fluid">
    <div class="row">

        <div class="col-sm">
            <div class="card h-100 shadow-sm">
                <div class="card-header">
                    <h4>1. Välj media</h4>
                </div>
                <div class="card-body">
                    <p><span data-feather="info"></span> Skanna eller skriv in ett serienummer nedan</p>
                    <hr>
                    <div class="input-group mb-3">
                        <input type="text" name="item_id" class="form-control" placeholder="00870006044" maxlength="11" aria-label="item_id" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card h-100 shadow-sm">
                <div class="card-header">
                    <h4>2. Avsluta lånet</h4>
                </div>
                <div class="card-body">
                    <p><span data-feather="info"></span> Klicka på knappen nedan för att avsluta lånet</p>
                    <hr>
                    <input  value="Avsluta" type="submit" class="btn btn-primary btn-lg">
                </div>
            </div>
        </div>
        
    </div>
</div>