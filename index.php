<?php
require_once  "loader.php";
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}

?>





<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/lib/css/bootstrap.rtl.css">
</head>

<body class="position-relative">
    <?php include "includes/header.php"; ?>


    <div class="container-fluid ">
        <div class="div-index">
            <?php
            $page = $_GET['page'] ?? 'home';

            include "pages/$page.php"; ?>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <script src="/azimi_notes_complate/assets/lib/js/bootstrap.bundle.js"></script>
</body>


</html>