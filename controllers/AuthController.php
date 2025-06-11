<?php
require_once '../loader.php';

session_start();

if (isset($_POST["login_submit"])) {
    if (empty($_POST['email']) || empty($_POST["password"])) {
        $_SESSION["error"] = 'فیلد های مورد نظر رو پر کنید ';
        header("Location: ../index.php?page=login");
        exit;
    } else {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $request = mysqli_query($connection,  "SELECT * FROM `users` WHERE user_email = '$username'");
        if (mysqli_num_rows($request) > 0) {
            $row_sql = mysqli_fetch_row($request);

            if ($row_sql[4] == $_POST['password']) {
                $_SESSION['success'] = "ورود موفیقت آمیز بود در حال روت به پنل";
                $_SESSION["user"] = $username;
                header("Location: ../index.php?page=panel");
                exit;
            } else {
                $_SESSION["error"] = 'نام کاربری و یا پسورد اشتباه است ';
                header("Location: ../index.php?page=login");
                exit;
            }
        } else {
            $_SESSION["error"] = 'نام کاربری یافت نشد ';
            header("Location: ../index.php?page=login");
            exit;
        }
    }
}


if (isset($_POST['sign_in_submit'])) {
    $errors = [];

    if (isset($_POST['sign_in_submit'])) {
        if (empty($_POST["name"])) {
            $errors['name'] = 'نام را وارد کنید';
        }
        if (empty($_POST["email"])) {
            $errors['email'] = 'ایمیل را وارد کنید';
        }
        if (empty($_POST["phone"])) {
            $errors['phone'] = 'شماره تلفن را وارد کنید';
        }
        if (empty($_POST["password"])) {
            $errors['password'] = 'پسورد را وارد کنید';
        }
        if ($_POST['password'] != $_POST['repeat-password']) {
            $errors['repeat-password'] = 'پسورد و تکرار آن یکی نیست ';
        }

        if (strlen($_POST["password"]) < 6) {
            $errors['password'] = "طول پسورد را بیشتر بزار";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: ../index.php?page=signin");
            exit;
        }
    }
}
