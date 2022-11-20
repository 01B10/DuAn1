
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/admin/assets/css/dashboard.css"?>">
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/summernote.css"?>" rel="stylesheet" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/bootstrap.min.css"?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/admin/assets/css/adminPage.css"?>">
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/select2.min.css"?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/core.css"?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/components.css"?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/admin/assets/css/addCustomer.css"?>">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/admin/assets/css/addTour.css"?>">
    <script src="https://kit.fontawesome.com/5dd6f63e97.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

</head>

<body>
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>Admin</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li class="list">
                    <a href="dashboard" title="Dashboard"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Customers"><span class="las la-user"></span>
                        <span>Customers</span></a>
                    <div class="dropdown">
                        <a href="listUser">List</a>
                        <a href="addCustomer">Add</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Service"><span class="las la-clipboard-list"></span>
                        <span>Service</span></a>
                    <div class="dropdown">
                        <a href="listService">List</a>
                        <a href="addService">Add</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Order"><span class="las la-shopping-bag"></span>
                        <span>Oder</span></a>
                    <div class="dropdown">
                        <a href="listOrder">List</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Province"><span class="fa-solid fa-mountain-city"></span>
                        <span>Province</span></a>
                    <div class="dropdown">
                        <a href="listProvince">List</a>
                        <a href="addProvince">Add</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Tours"><span class="fa-solid fa-mountain-sun"></span>
                        <span>Tours</span></a>
                    <div class="dropdown">
                        <a href="listTour">List</a>
                        <a href="addTour">Add</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Tours"><span class="fa-solid fa-truck-plane"></span>
                        <span>Transport</span></a>
                    <div class="dropdown">
                        <a href="listTransport">List</a>
                        <a href="addTransport">Add</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Comment"><span class="fa-regular fa-comment"></span></span>
                        <span>Comment</span></a>
                    <div class="dropdown">
                        <a href="listcomment">List</a>
                    </div>
                </li>
                <li class="list">
                    <a href="#" class="drop" title="Blog"><span class="fa-brands fa-blogger"></span>
                        <span>Blog</span></a>
                    <div class="dropdown">
                        <a href="listBlog">List</a>
                        <a href="addBlog">Add</a>
                    </div>
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
                <!-- Dashboard -->
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