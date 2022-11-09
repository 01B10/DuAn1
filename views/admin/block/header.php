<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale-1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/admin/assets/css/adminPage.css"?>">
    <script src="https://kit.fontawesome.com/5dd6f63e97.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span>Multiverse Travel</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li class="list">
                    <a href="#" class="drop"><span class="las la-user"></span>
                        <span>Customers</span></a>
                    <div class="dropdown">
                        <a href="listuser">List</a>
                        <a href="#2">Add</a>
                        <!-- <a href="#3">3</a> -->
                    </div>
                </li>
                <li class="list">
                    <a href="#5"><span class="las la-clipboard-list"></span>
                        <span>Projects</span></a>
                </li>
                <li class="list">
                    <a href="#6"><span class="las la-shopping-bag"></span>
                        <span>Oder</span></a>
                </li>
                <li class="list">
                    <a href="#"><span class="las la-receipt"></span>
                        <span>Inventory</span></a>
                </li>
                <li class="list">
                    <a href="#"><span class="las la-user-circle"></span>
                        <span>Account</span></a>
                </li>
                <li class="list">
                    <a href="#"><span class="las la-user-circle"></span>
                        <span>Comment</span></a>
                </li>
                <li class="list">
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>task</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper">
                <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                <div>
                    <h4>Join Doe</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>