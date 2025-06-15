<?php

require_once "../loader.php";
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: $base_url/index.php?page=login");
    exit;
}


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId =  $_SESSION['userID'];
}

$allnotes = mysqli_query($connection, "SELECT * FROM `notes` WHERE  `note_user` =  $userId");

if (mysqli_num_rows($allnotes) > 0) {
} else {
    $allnotes = null;
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
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" scope="col">عنوان</th>
                                            <th class="text-center" scope="col">توضیحات</th>
                                            <th class="text-center" scope="col">تاریخ سر رسید </th>
                                            <th class="text-center" scope="col">تصویر</th>
                                            <th class="text-center" scope="col">وضعیت</th>
                                            <th class="text-center" scope="col">عملیات</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($allnotes as $notes) {

                                    ?>
                                        <tbody>
                                            <tr class="align-content-center text-center">
                                                <th scope="row "><?php echo $i++ ?></th>
                                                <td class="align-content-center text-center"><?php echo $notes['note_title'] ?></td>
                                                <td class="align-content-center text-center"><?php echo $notes['note_caption'] ?></td>
                                                <td class="align-content-center text-center"><?php echo $notes['note_created'] ?></td>
                                                <td class="align-content-center text-center"><img class="img-notes" src="<?php echo $notes['note_image'] ?>" alt="noImageSet"></td>
                                                <td class="align-content-center text-center"><?php echo $notes['notes_bookmark'] ?   '<a class="bookmark-notes">مارک شده مهم </a>' :  '<a class="no-bookmark-notes">عادی</a>' ?></td>
                                                <td class="align-content-center text-center">
                                                    <a type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewNoteModal"
                                                        data-title="<?= $notes['note_title'] ?>"
                                                        data-caption="<?= $notes['note_caption'] ?>"
                                                        data-image="<?= $notes['note_image'] ?>"
                                                        data-created="<?= $notes['note_created'] ?>"
                                                        data-bookmark="<?= $notes['notes_bookmark'] ? 'بله' : 'خیر' ?>">
                                                        مشاهده
                                                    </a> <a data-bs-toggle="modal"
                                                        data-bs-target="#editModalNotes"
                                                        data-id="<?= $notes['note_id'] ?>"
                                                        data-title="<?= $notes['note_title'] ?>"
                                                        data-caption="<?= $notes['note_caption'] ?>"
                                                        data-image="<?= $notes['note_image'] ?>"
                                                        data-created="<?= $notes['note_created'] ?>"
                                                        data-bookmark="<?= $notes['notes_bookmark'] ? 'بله' : 'خیر' ?>"
                                                        class="btn btn-sm btn-warning">ویرایش</a>
                                                    <a href="controllers/deleteNote.php?deleteID=<?= $notes['note_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                                                </td>
                                            </tr>

                                        </tbody>

                                    <?php
                                    }

                                    ?>

                                </table>


                            <?php
                            }
                            ?>
                        </div>

                        <div id="bookmark" class="tabcontent">
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
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" scope="col">عنوان</th>
                                            <th class="text-center" scope="col">توضیحات</th>
                                            <th class="text-center" scope="col">تاریخ سر رسید </th>
                                            <th class="text-center" scope="col">تصویر</th>
                                            <th class="text-center" scope="col">وضعیت</th>
                                            <th class="text-center" scope="col">عملیات</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($allnotes as $notes) {

                                    ?>
                                        <?php if ($notes['notes_bookmark']) {

                                        ?>
                                            <tbody>
                                                <tr class="align-content-center text-center">
                                                    <th scope="row "><?php echo $i++ ?></th>
                                                    <td class="align-content-center text-center"><?php echo $notes['note_title'] ?></td>
                                                    <td class="align-content-center text-center"><?php echo $notes['note_caption'] ?></td>
                                                    <td class="align-content-center text-center"><?php echo $notes['note_created'] ?></td>
                                                    <td class="align-content-center text-center"><img class="img-notes" src="<?php echo $notes['note_image'] ?>" alt="noImageSet"></td>
                                                    <td class="align-content-center text-center"><?php echo $notes['notes_bookmark'] ?   '<a class="bookmark-notes">مارک شده مهم </a>' :  '<a class="no-bookmark-notes">عادی</a>' ?></td>
                                                    <td class="align-content-center text-center">
                                                        <a type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewNoteModal"

                                                            data-title="<?= $notes['note_title'] ?>"
                                                            data-caption="<?= $notes['note_caption'] ?>"
                                                            data-image="<?= $notes['note_image'] ?>"
                                                            data-created="<?= $notes['note_created'] ?>"
                                                            data-bookmark="<?= $notes['notes_bookmark'] ? 'بله' : 'خیر' ?>">
                                                            مشاهده
                                                        </a> <a data-bs-toggle="modal"
                                                            data-bs-target="#editModalNotes"
                                                            data-id="<?= $notes['note_id'] ?>"
                                                            data-title="<?= $notes['note_title'] ?>"
                                                            data-caption="<?= $notes['note_caption'] ?>"
                                                            data-image="<?= $notes['note_image'] ?>"
                                                            data-created="<?= $notes['note_created'] ?>"
                                                            data-bookmark="<?= $notes['notes_bookmark'] ? 'بله' : 'خیر' ?>"
                                                            class="btn btn-sm btn-warning">ویرایش</a>
                                                        <a href="controllers/deleteNote.php?deleteID=<?= $notes['note_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        <?php
                                        } ?>
                                    <?php
                                    }

                                    ?>

                                </table>


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
    <script src="<?php echo $base_url ?>/assets/js/main.js"></script>
    <script src="<?php echo $base_url ?>/assets/lib/js/bootstrap.bundle.js"></script>
    <div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">یادداشت جدید </h5>
                    <button type="button" class="close btn ms-auto" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $base_url . "controllers/addNotes.php" ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title-notes" class="col-form-label">موضوع :</label>
                            <input type="text" class="form-control" name="title-notes" id="title-notes">
                        </div>
                        <div class="form-group">
                            <label for="caption-notes" class="col-form-label">متن یادداشت</label>
                            <textarea class="form-control" name="caption-notes" id="caption-notes"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="image" class="col-form-label">عکس برای آپلود </label>
                            <input class="form-control" id="image" type="file" name="image-notes">
                        </div>

                        <div class="form-group mt-2">
                            <label for="bookmark" class="col-form-label">این یادداشت مارک شود </label>
                            <input type="checkbox" id="bookmark" name="bookmark-notes">
                        </div>


                        <div class="form-group mt-2">
                            <label for="date" class="col-form-label">تاریخ برای یاددآوری</label>
                            <input type="date" id="date" name="date-notes">
                        </div>


                        <div class="modal-footer mt-4">
                            <input type="submit" name="addNotesSubmit" value="اضافه کردن یادداشت" class="btn btn-dark submit">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="viewNoteModal" tabindex="-1" aria-labelledby="viewNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewNoteModalLabel">مشاهده یادداشت</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <p><strong>موضوع:</strong> <span id="noteTitle"></span></p>
                    <p><strong>متن یادداشت:</strong> <span id="noteCaption"></span></p>
                    <img id="noteImage" class="modal-image-notes" src="" alt="تصویر یادداشت">
                    <p class="mt-2"><strong>تاریخ ایجاد:</strong> <span id="noteCreated"></span></p>
                    <p><strong>بوکمارک شده:</strong> <span id="noteBookmark"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editModalNotes" tabindex="-1" aria-labelledby="viewNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalNotes">ویرایش یادداشت</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo $base_url ?>controllers/editNotes.php" method="POST">
                        <input type="hidden" name="id-edit" id="id-edit">
                        <div class="form-group">
                            <label for="edit-noteTitle" class="col-form-label">موضوع :</label>
                            <input type="text" class="form-control" name="edit-noteTitle" id="edit-noteTitle">
                        </div>
                        <div class="form-group">
                            <label for="edit-noteCaption" class="col-form-label">متن یادداشت</label>
                            <textarea class="form-control" name="edit-noteCaption" id="edit-noteCaption"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-noteImage" class="col-form-label"> تغییر عکس </label>
                            <input class="form-control" id="edit-noteImage" type="file" name="edit-noteImage" value="edit-noteImage">
                            <input type="hidden" name="old-noteImage" id="old-noteImage">
                            <img id="editNoteImage" name="editNoteImage" class="img-fluid" alt="no image set">
                        </div>
                        <div class="form-group mt-2">
                            <label for="edit-noteBookmark" class="col-form-label">این یادداشت مارک شود </label>
                            <input type="checkbox" id="edit-noteBookmark" name="edit-noteBookmark">
                        </div>
                        <div class="form-group mt-2">
                            <label for="edit-noteDate" class="col-form-label">تاریخ برای یاددآوری</label>
                            <input type="date" id="edit-noteDate" name="edit-noteDate">
                        </div>
                        <div class="modal-footer mt-4">
                            <input type="submit" name="editNotesSubmit" value="ویرایش  یادداشت" class="btn btn-dark submit">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>