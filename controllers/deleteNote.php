<?php
require_once '../loader.php';
echo $_GET['deleteID'];
if (isset($_GET['deleteID'])) {
    $deleteNoteId = $_GET['deleteID'];
    $delete = mysqli_query($connection, "DELETE FROM `notes` WHERE `note_id`= $deleteNoteId");
    if ($delete) {
        header("Location:  ../panel");
        exit;
    } else {
        header("Location:  ../panel");
        exit;
    }
}
