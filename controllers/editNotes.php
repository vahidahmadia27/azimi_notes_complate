<?php
session_start();
require_once '../loader.php';

if (isset($_POST['editNotesSubmit'])) {
    $userId = $_SESSION['userID'];
    $title = $_POST['edit-noteTitle'];
    $caption = $_POST['edit-noteCaption'];
    $bookmark = isset($_POST['edit-noteBookmark']) ? 1 : 0;
    $date = $_POST['edit-noteDate'];
    $note_id = $_POST['id-edit'];
    $oldImage = $_POST['old-noteImage'];

    if (isset($_FILES["edit-noteImage"]) && $_FILES["edit-noteImage"]["error"] === UPLOAD_ERR_OK) {
        $temp_file = $_FILES["edit-noteImage"]["tmp_name"];
        $dir_upload = "uploads/";
        $new_name = "file-" . time() . ".png";

        $status = move_uploaded_file($temp_file, "../$dir_upload" . $new_name);
        if ($status) {
            $note_image_path = $dir_upload . $new_name;
        } else {
            $note_image_path = $oldImage;
        }
    } else {
        $note_image_path = $oldImage;
    }

    if (!empty($title) || !empty($caption)) {
        $update = mysqli_query($connection, "UPDATE `notes` SET `note_title`='$title', `note_caption`='$caption', `note_created`='$date', `note_image`='$note_image_path', `notes_bookmark`='$bookmark' WHERE `note_id` = '$note_id'");

        if ($update) {
            header("location: ../panel");
            exit;
        }
    }
}
