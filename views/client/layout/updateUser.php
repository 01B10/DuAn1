<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi thông tin</title>
    <link rel="stylesheet" href="../assets/css/updateUser.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <form action="">
            <div class="account">
                <h3>Thay đổi thông tin</h3>
                <div class="user">
                    <div class="user-img">
                        <img src="../img/default-image.jpg" alt="">
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

                        <div class="gender">
                            <p class="gioitinh" for="">Giới tính</p>
                            <div class="gender-choose">
                                <label for="nam"><input id="nam" type="radio" name="radio"> Nam</label>
                                <label for="nu"><input id="nu" type="radio" name="radio"> Nữ</label>
                                <label for="other"><input id="other" type="radio" name="radio"> Khác</label>
                            </div>
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
                            <input type="text" value="">
                        </div>
                        <div class="info">
                            <label for="">Vai trò</label>
                            <input type="text" value="">
                        </div>
                    </div>
                </div>
                <div class="update">
                    <a href=""><button>Cập nhật thông tin</button></a>
                </div>
            </div>
        </form>
    </main>
</body>

</html>