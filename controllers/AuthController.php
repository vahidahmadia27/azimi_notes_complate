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
        $password = md5($_POST['password']);
        $request = mysqli_query($connection,  "SELECT * FROM `users` WHERE user_email = '$username'");
        if (mysqli_num_rows($request) > 0) {
            $row_sql = mysqli_fetch_row($request);

            if ($row_sql[4] == $password) {
                $_SESSION['success'] = "ورود موفیقت آمیز بود در حال روت به پنل";
                $_SESSION["user"] = $username;
                header("Location: ../panel");
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

        if (empty($_POST["family"])) {
            $errors['family'] = 'نام خانوادگی را وارد کنید';
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
    $username = $_POST["name"];
    $userFamily = $_POST["family"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $phone - $_POST["phone"];

    $check = mysqli_query($connection, "SELECT * FROM `users` WHERE user_email = '$email'");
    if (mysqli_num_rows($check)) {
        $errors['email'] = "ایمیل وجود دارد لطفا وارد شوید";
        $_SESSION['errors'] = $errors;
        header("Location: ../index.php?page=signin");
        exit;
    } else {
        mysqli_query($connection, "INSERT INTO `users`(`user_id`, `user_name`, `user_family`, `user_email`, `user_password`, `user_date_create`, `user_phone`) VALUES ('','$username','$userFamily','$email','$password','','$phone')");
        $_SESSION['success'] =  "ثبت نام موفیقت آمیز بود لطفا وارد شوید";
        header("location: ../index.php?page=login");
        exit;
    }
}
