<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/login.css"?>">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <a href="Trang-Chu">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <div class="container">
        <form action="">
            <h2>Login form</h2>
            <div class="input-field">
                <input type="text" required>
                <label for="">Email or Phone Number</label>
            </div>
            <div class="input-field">
                <input type="password" class="pass" required>
                <label for="">Password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
            </div>
            <div class="forgot">
                <a href="forgotpassword">Forgot password?</a>
            </div>
            <div class="button">
                <button style="--clr:#1e9bff">
                    <a href=""><span>Login</span></a>
                </button>
            </div>
            <div class="register">
                <p>Not a member? <a href="Register">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
<script>
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
</script>