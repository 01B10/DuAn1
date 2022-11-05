<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/taikhoan.css">
</head>

<body>
    <main>
        <h2>Thông tin tài khoản</h2>
        <form action="" method="post">
            <div class="account">
                <h3>Thông tin tài khoản</h3>
                <div class="user">
                    <div class="user-img">
                        <img src="../img/Default_pfp.svg.png" alt="">
                        <div class="change-img">
                            <input type="file" name="" id="">
                            <button>Cập nhật</button>
                        </div>
                    </div>
                    <div class="info">
                        <label for="">Họ và tên</label>
                        <input type="text" value="" readonly>
                    </div>

                    <div class="info">
                        <label for="">Giới tính</label>
                        <input type="text" value="" readonly>
                    </div>
                    <div class="info">
                        <label for="">Email</label>
                        <input type="text" value="" readonly>
                    </div>
                    <div class="info">
                        <label for="">Số điện thoại</label>
                        <input type="text" value="" readonly>
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
            <div class="change">
                <h3>Đổi mật khẩu</h3>
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
                </div>
                <button><i fa fa-lock></i><a href="">Thay đổi</a></button>
            </div>
        </form>
    </main>
</body>

</html>