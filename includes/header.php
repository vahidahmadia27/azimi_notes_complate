<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/azimi_notes_complate/assets/css/style.css">
    <link rel="stylesheet" href="/azimi_notes_complate/assets/lib/css/bootstrap.rtl.css">
    <title>header</title>
</head>

<body>
    <nav>
        <ul>
            <li>خانه</li>
            <li>
                <?php echo isset($user) ? '<a href="user-panel.php">پنل کاربری</a>' : '<a href="index.php?page=login">ورود و یا ثبت نام</a>'; ?>
            </li>
            <li>
                <a href="index.php?page=login">صفحه ورود</a>
            </li>
            <li>
                تماس با ما
            </li>

        </ul>
    </nav>




</body>

</html>