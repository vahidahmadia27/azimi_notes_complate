<nav class="navbar navbar-expand-lg menu-notes" dir="rtl">
    <a class="navbar-brand" href="<?php echo $base_url ?>">
        <img src="/azimi_notes_complate/assets/images/icons/357.jpg" width="30" height="30" class="d-inline-block align-top" alt="">

        دفترچه یادداشت</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/azimi_notes_complate/">خانه</a>
            </li>
            <li class="nav-item">
                <?php
                echo isset($user)
                    ? '<a class="nav-link" href="' . $base_url . 'pages/panel.php">پنل کاربری</a>'
                    : '<a class="nav-link" href="?page=login">ورود و یا ثبت نام</a>';
                ?> </li>
        </ul>
    </div>
</nav>