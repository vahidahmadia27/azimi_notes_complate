<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: $base_url/index.php?page=login");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel</title>
</head>

<body>
    <a href="<?php echo $base_url ?>./controllers/logout.php">خروج</a>

</body>

</html>