<?php

require_once "../loader.php";
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: $base_url/index.php?page=login");
    exit;
}


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>/assets/lib/css/bootstrap.rtl.css">
    <title>panel</title>
</head>

<body class="position-relative">
    <?php include "../includes/header.php"; ?>
    <?php
    include "../includes/asideMenu.php"
    ?>



    <div class="container-fluid div-index  ">

        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="margin-panel">
                    <div class="notes">
                        <div class="tab">
                            <button class="tablinks" id="open" onclick="openCity(event, 'all_notes')">همه یادداشت ها </button>
                            <button class="tablinks" onclick="openCity(event, 'bookmark')">یادداشت های مارک شده </button>
                            <button class="tablinks" onclick="openCity(event, 'soon_by_date')">نزدیک ترین تاریخ</button>
                        </div>


                        <div id="all_notes" class="tabcontent">
                            <?php
                            if (!isset($allnotes) || empty($allnotes)) {

                            ?>
                                <div class="text-center">
                                    <h2>یادداشتی یافت نشد</h2>
                                    <img class="img-panel" src="<?php echo $base_url ?>/assets/images/empty.jpg" alt="">
                                </div>
                            <?php
                            } else {
                            ?>
                                <h3>همه یادداشت ها </h3>
                                <!-- this place for foreach -->

                            <?php
                            }
                            ?>
                        </div>

                        <div id="bookmark" class="tabcontent">
                            <?php
                            if (!isset($allNotesBookmark) || empty($allNotesBookmark)) {

                            ?>
                                <div class="text-center">
                                    <h2>یادداشتی مارکی یافت نشد</h2>
                                    <img class="img-panel" src="<?php echo $base_url ?>/assets/images/empty.jpg" alt="">
                                </div>
                            <?php
                            } else {
                            ?>
                                <h3>یادداشت های مارک شده </h3>
                                <!-- this place for foreach -->

                            <?php
                            }
                            ?>
                        </div>

                        <div id="soon_by_date" class="tabcontent">
                            <?php
                            if (!isset($allNotesSortDate) || empty($allNotesSortDate)) {

                            ?>
                                <div class="text-center">
                                    <h2>یادداشتی یافت نشد</h2>
                                    <img class="img-panel" src="<?php echo $base_url ?>/assets/images/empty.jpg" alt="">
                                </div>
                            <?php
                            } else {
                            ?>
                                <h3>یادداشت های در حال انقضا</h3>
                                <!-- this place for foreach -->

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <?php include "../includes/footer.php"; ?>
    <script>
        function openCity(evt, tabs) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabs).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("open").click();
    </script>
    <script src="<?php echo $base_url ?>/assets/lib/js/bootstrap.bundle.js"></script>


</body>

</html>