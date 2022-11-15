<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/register.css"?>">
    <!-- <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        
    </style>
</head>


<body>
    <div class="container">

        <form action="" method="POST" class="form" id="form-1">
            <h2>Register</h2>
            <div class="input-field form-group">
                <input id="fullname" name="fullname" type="text"  class="form-control">
                <label for="">Enter your name</label>
                <p class="form-message"></p>
            </div>
            <div class="input-field form-group" >
                <input id="email" name="email" type="input"  class="form-control">
                <label for="">Enter your email</label>
                <p class="form-message"></p>
            </div>
            <div class="input-field form-group">
                <input type="input"  class="form-control" id="phone" name="phone">
                <label for="">Phone number</label>
                <p class="form-message"></p>
            </div>
            <div class="gender form-group horizontal">
                <label class="pick form-label" for="password_confirmation" >Gender</label>
                <label for="male">Nam</label>
                <input name="gender" type="radio" class="form-control-gender" value="Nam" checked>
                <label for="" class="female">Nữ</label>
                <input name="gender" type="radio" class="form-control-gender" value="Nữ">
                <label for="" class="orther">Khác</label>
                <input name="gender" type="radio" class="form-control-gender" value="Khác">
                <p class="form-message"></p>
                </div>
                
            
            <div class="input-field form-group">
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <label id="password" name="password" for="">Password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="form-message"></p>
            </div>
            <div class="input-field form-group">
                <input id="password_confirmation" name="password_confirmation" type="password"  class="form-control">
                <label for="">Confirm password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="form-message"></p>
            </div>
            <!-- <div class="capcha form-group">
                <label for="capcha-input">Enter capcha</label>
                <div class="preview"></div>
                <div class="capcha-form">
                    <input type="text"  id="capcha-form" placeholder="Enter capcha">
                    <button class="capcha-refresh"><i class="fas fa-sync"></i></button>
                </div>
                <p class="form-message"></p>
            </div> -->
            <!-- <div class="forgot">
                <a href="./ForgotPass.html">Forgot password?</a>
            </div> -->
            <div class="button">
                <button style="--clr:#1e9bff" class="form-submit">
                    <a href=""><span>Register Now</span></a>
                </button>
            </div>
            <div class="signin">
                <p>Already have an account?<a href="./Login.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
<!-- <script>
    const passField = document.querySelector("input");
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

    (function(){
        const form=["cursive","sans-serif","serif","mốnpace"];
        let capchaValue="";
        function generateCapcha(){
            let value=btoa(Math.random()*1000000000);
            value=value.substr(0,5+Math.random()*5);
            capchaValue=value;
        }
        function setCapcha(){
            capchaValue.split(""),Map((char)=>
            {
                const rotate=-20 + Math.trunc(Math.random()*30);
                const font =Math.trunc(Math.random()*font.length);
                return `<span style="transform:rotate(${rotate}deg);
                font-family:${fonts[font]}">
                ${char}</span>`;
            }).join("");
            document.querySelector(".preview").innerHTML=html;
        }
        function initCapcha(){
            document.querySelector(".capcha-refresh").addEventListener("click",function(){
                generateCapcha();
                setCapcha();
            });
            generateCapcha();
            setCapcha();
        }
        initCapcha();
    })();
</script> -->
<script src="http://localhost/DuAn1/DuAn1/views/client/assets/js/validator.js"></script>
<script>
        // ong mốn cả chúng ta khi sử dụng thư viện 
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname','Vui lòng nhập Họ và Tên!'),
                Validator.isRequired('#email'),
                Validator.isEmail('#email','Vui lòng nhập chính xác Email!'),
                Validator.isRequired('input[name="gender"]'),
                Validator.isRequired('#phone','Vui lòng nhập số điện thoại!'),
                Validator.isPhone('#phone','Vui lòng nhập chính xác số điện thoại!'),
                Validator.minLength('#phone' ,9,'Số điện thoại phải có ít nhất 9 chữ số'),
                Validator.minLength('#password' ,6,'Vui lòng nhập ít nhất 6 ký tự'),
                Validator.isRequired('#password_confirmation'),
                Validator.isRequired('#province'),
                Validator.isConfirmed('#password_confirmation', function () {
                     return document.querySelector('#form-1 #password').value;
                },'Mật Khẩu nhập lại không chính xác')

            ],
          onsubmit: function (data) {
            console.log(data);
          }
        })
      </script>