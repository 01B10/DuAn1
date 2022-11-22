<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/taikhoan.css"?>">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <h2>Thông tin tài khoản</h2>
        <form action="" >
            <div class="account">
                <h3>Thông tin tài khoản</h3>
                <div class="user">
                    <div class="user-img">
                        <img src="../img/Default_pfp.svg.png" alt="">
                        <div class="change-img">
                            <label for="">Thay đổi ảnh đại diện</label><br>
                            <input type="file" name="" id="">
                          <a href=""><button>Cập nhật</button></a>  
                        </div>
                    </div>
                    <div class="infomation">
                        <div class="info">
                            <label for="">Họ và tên</label>
                            <input type="text" value="">
                        </div>

                        <div class="info">
                            <label for="">Giới tính</label>
                            <input type="text" value="">
                        </div>
                        <div class="info">
                            <label for="">Email</label>
                            <input type="text" value="">
                        </div>
                        <div class="info">
                            <label for="">Số điện thoại</label>
                            <input type="text" value="">
                        </div>
                        <div class="info">
                            <label for="">Địa chỉ</label>
                            <input type="text" value="" readonly>
                        </div>
                        <div class="info">
                            <label for="">Chưa nghĩ ra</label>
                            <input type="text" value="" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="change">
                <h3 class="h3-change">Đổi mật khẩu</h3>
                <div class="change-pass">
                    <div class="new-pass">
                        <label for="">Mật khẩu cũ</label>
                        <input type="password" placeholder="Nhập mật khẩu cũ">
                    </div>
                    <div class="new-pass">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="new-pass">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <a href=""><button><i class="fas fa-lock"></i>Thay đổi</button></a>
                </div>
                
            </div>
        </form>
        <div class="history">
            <h3>Lịch sử đơn đặt</h3>
            <table cellpadding="10"  >
                <thead>
                    <th>Id</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Tour</th>
                    <th>Thời gian đặt</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                            <!-- php code -->
                        </td>
                        <td>
                           
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                        <td>
                          
                            <!-- php code -->
                        </td>
                        <td>
                           
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>