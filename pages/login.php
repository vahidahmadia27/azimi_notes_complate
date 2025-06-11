<?php

if (isset($_SESSION['error'])) {
    $errors = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>login</title>
</head>

<body>


    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 col-12">


            <div id="div-login" class="div-login  text-center show">
                <h2 class="text-start m-2">لطفا نام کاربری و رمز عبور را وارد کنید</h2>
                <form action="<?php echo $base_url ?>controllers/AuthController.php" method="POST" class="mt-5" id="form-login">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="email" id="floatingInput" placeholder="email">
                        <label for="floatingInput">نام کاربری</label>
                    </div>
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">رمز عبور</label>
                        <input type="checkbox" class="position-absolute top-50 end-0 translate-middle-y me-2" style="z-index:2;" onclick="showPass()" tabindex="-1">

                    </div>
                    <?php
                    if (!empty($errors)) {
                        echo "<span class='text-danger d-block m-1 text-start fw-bold error'>$errors </span>";
                    }

                    ?>

                    <div class="text-center">
                        <input type="hidden" name="hidden" value="login">
                        <input class="btn btn-dark  mt-5  submit" type="submit" name="login_submit" value="ورود">
                    </div>
                </form>
                <p class="p-0 mt-4">
                    <span>برای <a href="?page=signin" id="changeToRegister" class=" ">ثبت نام </a> کلیک کنید </span>
                </p>
            </div>

        </div>

    </div>
    <script>
        const showPass = () => {
            const password = document.getElementById("floatingPassword");
            if (password.type == "password") {
                password.type = "text";
            } else {
                password.type = "password"
            }
        }
    </script>
</body>

</html>