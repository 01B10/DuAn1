<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/register.css">
    <!-- <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div class="container">

        <form action="">
            <h2>Register</h2>
            <div class="input-field">
                <input type="text" required class="name"> 
                <p style="color: red;" class="name_err"></p>
                <label for="">Enter your name<a href="">*</a></label>
               
            </div>
            <div class="input-field">
                <input type="text" required class="email">
                <p style="color: red;" class="email_err"></p>
                <label for="">Enter your email<a href="">*</a></label>
            </div>
            <div class="input-field">
                <input type="text" required class="phone">
                <p style="color: red;" class="phone_err"></p>
                <label for="">Phone number<a href="">*</a></label>
            </div>
            <div class="gender">
                <label class="pick" for="">Gender</label>
                <input type="radio" name="radio"><label for="male">Male</label>
                <input type="radio" name="radio"><label for="female">Female</label>
                <input type="radio" name="radio"><label for="other">Other</label>
            </div>
            <div class="input-field">
                <input type="password" class="pass" required>
                <p style="color: red;" class="pass_err"></p>
                <label for="">Password<a href="">*</a></label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
            </div>
            <div class="input-field">
                <input type="password" class="confirm-pass" required>
                <p style="color: red;" class="ConfirmPass_err"></p>
                <label for="">Confirm password<a href="">*</a></label>
                <!-- <span class="show-btn"><i class="fas fa-eye"></i></span> -->
            </div>
            <div class="capcha">
                <label for="capcha-input">Enter capcha</label>
                <div class="preview"></div>
                <div class="capcha-form">
                    <input type="text"  id="capcha-form" placeholder="Enter capcha">
                    <button class="capcha-refresh"><i class="fas fa-sync"></i></button>
                </div>
                <p style="color: red;" class="name_err"></p>
            </div>
            <!-- <div class="forgot">
                <a href="./ForgotPass.html">Forgot password?</a>
            </div> -->
            <div class="button">
                <button style="--clr:#1e9bff" onclick="validate()">
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
<script src="../../admin/js/validation.js"></script>
