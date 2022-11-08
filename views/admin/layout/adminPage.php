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
                    <a href="#"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="#" class="drop"><span class="las la-user"></span>
                        <span>Customers</span></a>
                    <div class="dropdown">
                        <a href="#1">1</a>
                        <a href="#2">2</a>
                        <a href="#3">3</a>
                    </div>
                </li>
                <li>
                    <a href="#5"><span class="las la-clipboard-list"></span>
                        <span>Projects</span></a>
                </li>
                <li>
                    <a href="#6"><span class="las la-shopping-bag"></span>
                        <span>Oder</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-receipt"></span>
                        <span>Inventory</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-user-circle"></span>
                        <span>Account</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-user-circle"></span>
                        <span>Comment</span></a>
                </li>
                <li>
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
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>$6k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <!-- <div class="projects"> -->
                <div class="card">
                    <div class="card-header">
                        <h3>Recent Project</h3>

                        <button>See all <span class="las la-arrow-right"></span></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Project Title</td>
                                        <td> Department</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ui/Ux Design</td>
                                        <td>Ui Team</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web development</td>
                                        <td>Font end</td>
                                        <td>
                                            <span class="status pink"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ushop app</td>
                                        <td>ushop app</td>
                                        <td>
                                            <span class="status orange"></span>
                                            Pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ui/Ux Design</td>
                                        <td>Ui Team</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web development</td>
                                        <td>Font end</td>
                                        <td>
                                            <span class="status pink"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ushop app</td>
                                        <td>ushop app</td>
                                        <td>
                                            <span class="status orange"></span>
                                            Pending
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ui/Ux Design</td>
                                        <td>Ui Team</td>
                                        <td>
                                            <span class="status pink"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web development</td>
                                        <td>Font end</td>
                                        <td>
                                            <span class="status pink"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ushop app</td>
                                        <td>
                                            <span class="status"></span>
                                            Pending
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customer</h3>

                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/tải xuống (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lewis S. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- </div> -->
        </main>
    </div>
</body>
<script>
    var slider = document.querySelectorAll(".sidebar-menu li > a");
    var drop = document.querySelector(".drop");
    var dropdown = document.querySelector(".dropdown");
    dropdown.style.height = "0px";
    drop.addEventListener("click",()=>{
        if(dropdown.style.height == "0px"){
            dropdown.style.height = "130px";
        }else{
            dropdown.style.height = "0px";
        }
    });
    for(let i = 0; i < slider.length; i++){
        slider[i].addEventListener("click",(e)=>{
            e.preventDefault();
            for(let k = 0; k < i; k++){
                slider[k].classList.remove("active");
            }
            for(let k = i+1; k < slider.length; k++){
                slider[k].classList.remove("active");
            }
            slider[i].classList.add("active");
        });
    }
</script>
</html>