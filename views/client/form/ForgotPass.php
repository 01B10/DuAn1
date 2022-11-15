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
            <h2>Forgot Password</h2>
            <div class="input-field form-group">
            <input id="email" name="email" type="text"  class="form-control">
            <label for="">Email</label>
            <p class="form-message"></p>
            </div>
            <!-- <div class="input-field">
                <input id="pass" type="password" required>
                <label for="">Password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
            </div> -->
            <!-- <div class="forgot">
                <a href="">Login</a>
            </div> -->
            <div class="button">
                <button style="--clr:#1e9bff">
                    <a href=""><span class="sendPass">Send Password</span></a>
                </button>
            </div>
            <div class="register">
                <p>Not a member? <a href="./register.php">Register</a></p>
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
<script>
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
</script>