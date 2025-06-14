 <?php


    if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
        $name = $_SESSION['name'] ?? "کاربر";
    }

    ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>aside</title>
 </head>

 <body class="position-relative d-inline">


     <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="<?php echo $base_url ?>assets/images/icons/arrow.svg" alt="icon" class="btn-icon"> منوی کاربر
     </button>

     <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
         <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><?php echo $name ?></h5>
             <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body  ">

             <div class="all_btn d-flex flex-column  text-center h-100 ">
                 <div class="mt-2">
                     <a type="button" class="btn-aside" data-bs-toggle="modal" data-bs-target="#addNotes" data-whatever="موضوع">اضافه کردن یادداشت جدید</a>
                 </div>
                 <div class="mt-2">
                     <a class=" btn-aside" href="<?php echo $base_url ?>./controllers/logout.php">نزدیک ترین تاریخ ها </a>
                 </div>
                 <div class="mt-2">
                     <a class=" btn-aside" href="<?php echo $base_url ?>./controllers/logout.php">تایمر برای یاددآوری</a>
                 </div>
                 <div class="mt-2">
                     <a class=" btn-aside" href="<?php echo $base_url ?>./controllers/logout.php"> شماره تلفن جدید</a>
                 </div>

                 <div class="mt-auto">
                     <a class=" btn w-100 btn-danger" href="<?php echo $base_url ?>./controllers/logout.php">خروج</a>
                 </div>

             </div>
         </div>
     </div>


 </body>

 </html>