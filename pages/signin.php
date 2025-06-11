<?php

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sign_in</title>
</head>

<body>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 col-12">
            <div id="div-register" class="div-register text-center ">
                <h2 class="text-start m-2">فیلد های زیر را برای ثبت نام پر کنید</h2>
                <form action="<?php echo $base_url ?>controllers/AuthController.php" method="POST" id="form-register">
                    <div class="form-floating mb-3  <?php echo (!empty($errors['name']) ? "error_class " : '') ?>">
                        <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">نام</label>
                    </div>
                    <div class='form-floating mb-3 <?php echo (!empty($errors['email']) ? "error_class " : '') ?>'>
                        <input type="email" class="form-control" name="email" id="floatingPassword" placeholder="email">
                        <label for="floatingPassword">ایمیل</label>
                    </div>
                    <div class="form-floating mb-3  <?php echo (!empty($errors['phone']) ? "error_class " : '') ?>">
                        <input type="text" class="form-control" name="phone" id="floatingPassword" placeholder="phone number">
                        <label for="floatingPassword">شماره تلفن</label>
                    </div>
                    <div class="form-floating mb-3  <?php echo (!empty($errors['password']) ? "error_class " : '') ?>">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">رمز عبور</label>
                    </div>
                    <div class="form-floating mb-3 <?php echo (!empty($errors['repeat-password']) ? "error_class " : '') ?>">
                        <input type="password" class="form-control" name="repeat-password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">تکرار رمز عبور</label>
                    </div>
                    <?php
                    if (!empty($errors)) {
                    ?>
                        <div class="error-container">
                            <?php
                            if (!empty($errors)) {
                                foreach ($errors as $error) {
                                    echo  "<div class='div-error  text-center'> <p class='text-danger  m-4 text-center fw-bold error'>$error</p></div>";
                                }
                            }
                            ?>

                        </div>
                    <?php
                    }
                    ?>

                    <div class="text-center">
                        <input type="hidden" name="hidden" value="register">
                        <input class="btn btn-dark  submit" type="submit" name="sign_in_submit" value="ثبت نام">
                    </div>
                </form>
                <a id="changeToLogin" href="?page=login">برای ورود کلیک کنید</a>
            </div>
        </div>
    </div>
</body>

</html>