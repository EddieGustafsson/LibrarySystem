<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if (strpos($url,'loanAdd=Success') == true) {
        echo "
        <div class='shadow alert alert-success alert-dismissible fade show' role='alert'>
            <span data-feather='info'></span>
            Lånet är nu tillagt.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }


    if (strpos($url,'loanAdd=ERROR?reason=NotAvailable') == true) {
        echo "
        <div class='shadow alert alert-danger alert-dismissible fade show' role='alert'>
            <span data-feather='alert-triangle'></span>
            Lånet kunde inte läggas till eftersom att det valda mediet inte är tillgänligt.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
      ";
    }

    if (strpos($url,'loanAdd=ERROR?reason=DontExist') == true) {
        echo "
        <div class='shadow alert alert-danger alert-dismissible fade show' role='alert'>
        <span data-feather='alert-triangle'></span>
            Lånet kunde inte läggas till eftersom att det valda mediet inte existerar.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
      ";
    }
?>