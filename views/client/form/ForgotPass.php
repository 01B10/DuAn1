<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "email" => "required",
    ];

    $message = [
        "email.required" => "Không được để trống",
    ];
    $errors = [];
    if(isset($_POST["sendpass"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $password = $queryBuilder->query($queryBuilder->table("customer")->select("password")
            ->where("customer.email","=",$_POST["email"])->orWhere("customer.phone","=",$_POST["email"])->get());
            if(!empty($password[0])){
                echo "<script>alert('Mật khẩu của bạn là: ".$password[0]["password"]."')</script>";
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
    <a href="Login">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <div class="container">
        <form action="" method="POST">
            <h2>Quên mật khẩu</h2>
            <div class="input-field">
                <input type="text" name="email">
                <label for="">Email hoặc Số điện thoại</label>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("email",$errors))?$errors["email"]:false?></p>
            </div>
            <div class="button">
                <button name="sendpass" style="--clr:#1e9bff">
                    <span class="sendPass">Gửi mật khẩu</span>
                </button>
            </div>
            <div class="register">
                <p>Không phải thành viên? <a href="register">Đăng ký</a></p>
            </div>
        </form>
    </div>
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