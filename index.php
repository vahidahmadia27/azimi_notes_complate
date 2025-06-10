<?php

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}

include "includes/header.php";


$page = $_GET['page'] ?? 'home';

include "pages/$page.php";




include "includes/footer.php";
