<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/login.css"?>">
    <!-- <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">

        <form action="" method="POST" class="" id="form-1">
            <h2>Login form</h2>
            <div class="input-field form-group">
            <input id="email" name="email" type="text"  class="form-control">
            <label for="">Email</label>
            <p class="form-message"></p>
            </div>
            <div class="input-field form-group">
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <label id="password" name="password" for="">Password</label>
            <span class="show-btn"><i class="fas fa-eye"></i></span>
            <p class="form-message"></p>
            </div>
            <div class="forgot">
                <a href="forgotpassword">Forgot password?</a>
            </div>
            <div class="button form-submit">
                <button style="--clr:#1e9bff">
                    <a href=""><span>Login</span></a>
                </button>
            </div>
            <div class="register">
                <p>Not a member? <a href="./Register.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="http://localhost/DuAn1/DuAn1/views/client/assets/js/validator.js"></script>
<script>
        // ong mốn cả chúng ta khi sử dụng thư viện 
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#email'),
                Validator.isEmail('#email','Vui lòng nhập chính xác Email!'),
                Validator.isRequired('#phone','Vui lòng nhập số điện thoại!'),
                Validator.isPhone('#phone','Vui lòng nhập chính xác số điện thoại!'),
                Validator.minLength('#phone' ,9,'Số điện thoại phải có ít nhất 9 chữ số'),
                Validator.minLength('#password' ,6,'Vui lòng nhập ít nhất 6 ký tự'),
            ],
          onsubmit: function (data) {
            console.log(data);
          }
        })
      </script>
</body>

</html>
<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
<!-- <script>
    const passField = document.querySelector(".pass");
    const showBtn = document.querySelector("span i");
    showBtn.onclick = (() => {
        if (passField.type == "password") {
            passField.type = "text";
            showBtn.classList.add("hide-btn");
        } else {
            passField.type = "password";
            showBtn.classList.remove("hide-btn");
        }
    });
</script> -->
