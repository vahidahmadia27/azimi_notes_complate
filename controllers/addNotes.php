<?php
require_once '../loader.php';
session_start();
$userId = $_SESSION['userID'];


if (isset($_POST['addNotesSubmit'])) {
    $errors = [];
    $success = [];
    if (!empty($_POST['title-notes']) || !empty($_POST['caption-notes'])) {
        if (isset($_POST['title-notes']) || isset($_POST['caption-notes']) || isset($_POST['image-notes']) || isset($_POST['date-notes']) || isset($_POST['bookmark-notes'])) {
            $titleNotes = $_POST['title-notes'] ?? null;
            $captionNotes = $_POST['caption-notes'] ?? null;
            $dateNotes = $_POST['date-notes'] ??  null;
            $bookmarkNotes = isset($_POST['bookmark-notes']) ? true : false;
            if (isset($_FILES["image-notes"]) && $_FILES["image-notes"]["error"] === UPLOAD_ERR_OK) {
                $temp_file = $_FILES["image-notes"]["tmp_name"];
                $dir_upload = "uploads/";
                $new_name = "file-" . time() . ".png";
                $status =  move_uploaded_file($temp_file, "../$dir_upload" . $new_name);
                if ($status) {
                    echo "upload ok !";
                } else {
                    echo " upload nook !";
                }
                $note_image_path =  $dir_upload  . $new_name;
            }
            $check = mysqli_query($connection,  "INSERT INTO `notes`(`note_id`, `note_title`, `note_caption`, `note_created`, `note_image`, `note_user` , `notes_bookmark`) VALUES ('','$titleNotes','$captionNotes','$dateNotes','$note_image_path','$userId' , '$bookmarkNotes')");
            if ($check) {
                $_SESSION['success'] = "یادداشت با موفقیت اضافه شد ";
                $success = $_SESSION['success'];
                header("Location:  ../panel");
                exit;
            }
        }
    } else {
        $errors = "فیلد خای است ";
        header("Location:  ../panel");
        exit;
    }
}
