<?php 
    if(isset($_GET["act"]) && $_GET["act"] == "logout"){
        unset($_SESSION["Login"]["customer"]);
        header("Location: Trang-Chu");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ . "/views/client/assets/css/TrangChu.css" ?>">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ . "/views/client/assets/css/saleTour.css" ?>">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ . "/views/client/assets/css/blogs.css" ?>">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/bookTour.css"?>">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/lienhe.css"?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
    <header>
        <div class="full_header">
            <div class="logo">
                <img src="<?php echo _WEB_ROOT_ . "/views/client/img/logo/logo.jpg" ?>" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="Trang-Chu">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="lienhe">Liên hệ</a></li>
                    <li><a href="blogs">Blog</a></li>
                </ul>
            </div>
            <div class="icon-1">
                <?php 
                    if(isset($_SESSION["Login"]["customer"])){
                ?>
                    <div class="avarta">
                        <span><?php echo $_SESSION["Login"]["customer"]["name"]?></span>
                        <img class="avarta" src="<?php echo _WEB_ROOT_."/views/client/img/customer/".$_SESSION["Login"]["customer"]["img"]?>" alt="">
                    </div>
                    <div class="drop">
                        <a href="account">Tài khoản</a>
                        <a href="bills">Hóa đơn</a>
                        <a href="?act=logout">Thoát</a>
                    </div>
                <?php
                    }else{
                ?>
                    <i class="fa-solid fa-user avarta"></i>
                    <div class="drop">
                        <a href="login">Login</a>
                        <a href="register">register</a>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="banner">
            <img src="<?php echo _WEB_ROOT_ . "/views/client/img/banners/bn1.jpg" ?>" alt="" id="img">
        </div>
    </header>