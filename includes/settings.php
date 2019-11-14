<?php
// Website Settings //

$domain_name = 'localhost';
$site_name = 'NTI - Bibliotek';
$login_footer = 'NTI Gymnasiet - Bibliotek &copy;2019';

// Page titel //
if(isset($_GET['page'])){
    switch ($_GET['page']) {
        case 'home':
            $page_titel = "Kontrollpanel";
            break;
        case 'addloan':
            $page_titel = "Gör ett lån";
            break;
        case 'endloan':
            $page_titel = "Avsluta ett lån";
            break;
        case 'reservmedia':
            $page_titel = "Gör en bokning";
            break;
        default:
            $page_titel = "Kontrollpanel"; 
    }
} else {
    include('page/firstpage.php'); 
}

// Database Settings //
$db_host = 'localhost'; //The database host example "localhost"
$db_user = 'root'; //Username for the database
$db_password = ''; //Password for the database
$db_name = 'librarysystem'; //The name of the database
