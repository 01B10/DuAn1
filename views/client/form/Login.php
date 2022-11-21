<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "email" => "required",
        "password" => "required",
    ];

    $message = [
        "email.required" => "Không được để trống",
        "password.required" => "Không được để trống",
    ];
    $errors = [];
    if(isset($_POST["login"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $customer = $queryBuilder->query($queryBuilder->table("customer")->select("*")
            ->where("customer.email","=",$_POST["email"])
            ->where("customer.password","=",$_POST["password"])
            ->orWhere("customer.phone","=",$_POST["email"])
            ->where("customer.password","=",$_POST["password"])
            ->get());
            $customer = $customer[0];
            if(!empty($customer)){
                if($customer["role"] == 1){
                    $_SESSION["Login"]["admin"] = $customer;
                    if(isset($_SESSION["Login"]["admin"])){
                        header("Location: admin/");
                    }
                }elseif($customer["role"] == 2){
                    $_SESSION["Login"]["customer"] = $customer;
                    if(isset($_SESSION["Login"]["admin"])){
                        header("Location: Trang-Chu");
                    }
                }
            }
        }
    }
?>

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
        <form action="" method="POST">
            <h2>Login form</h2>
            <p class="err"><?php echo (isset($customer) && empty($customer))?"Tài khoản hoặc Mật khẩu không đúng":false?></p>
            <div class="input-field">
                <input type="text" name="email" value="<?php if(!empty($_POST["email"])){echo $_POST["email"];}?>">
                <label for="">Email or Phone Number</label>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("email",$errors))?$errors["email"]:false?></p>
            </div>
            <div class="input-field">
                <input type="password" name="password" class="pass">
                <label for="">Password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("password",$errors))?$errors["password"]:false?></p>
            </div>
            <div class="forgot">
                <a href="forgotpassword">Forgot password?</a>
            </div>
            <div class="button">
                <button name="login" style="--clr:#1e9bff">
                    Login
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