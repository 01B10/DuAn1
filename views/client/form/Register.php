<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:10|max:30",
        "email" => "required|email|min:13|unique:customer:email",
        "phone" => "required|min:10|max:11|number|unique:customer:phone",
        "gender" => "required",
        "password" => "required|min:5|max:20",
        "repassword" => "required|match:password"
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "name phải có ít nhất 10 kí tự",
        "name.max" => "name không vượt quá 30 kí tự",
        "phone.required" => "Không được để trống",
        "phone.min" => "phone không hợp lệ",
        "phone.max" => "phone không hợp lệ",
        "phone.number" => "phone không hợp lệ",
        "phone.unique" => "phone đã tồn tại",
        "gender.required" => "không được để trống",
        "email.required" => "Không được để trống",
        "email.min" => "email phải có ít nhất 4 kí tự",
        "email.email" => "email không hợp lệ",
        "email.unique" => "email đã tồn tại",
        "password.required" => "Không được để trống",
        "password.min" => "password phải có ít nhất 4 kí tự",
        "password.max" => "password không vượt quá 10 kí tự",
        "repassword.required" => "Không được để trống",
        "repassword.match" => "repassword không đúng",
    ];
    $errors = [];
    if(isset($_POST["register"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        $data = array_filter($_POST);
        unset($data["repassword"]);
        $data["img"] = "Default_pfp.svg.png";
        if($validate){
            $queryBuilder->excute($queryBuilder->inserData("customer",$data));
            header("Location: Login");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/register.css"?>">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <a href="Trang-Chu">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <div class="container">

        <form action="" method="POST">
            <h2>Đăng ký</h2>
            <div class="input-field">
                <input type="text" name="name" value="<?php if(!empty($_POST["name"])){echo $_POST["name"];}?>">
                <label for="">Họ và Tên</label>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
            </div>
            <div class="input-field">
                <input type="email" name="email" value="<?php if(!empty($_POST["email"])){echo $_POST["email"];}?>">
                <label for="">Email</label>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("email",$errors))?$errors["email"]:false?></p>
            </div>
            <div class="input-field">
                <input type="text" name="phone" value="<?php if(!empty($_POST["phone"])){echo $_POST["phone"];}?>">
                <label for="">Số điện thoại</label>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("phone",$errors))?$errors["phone"]:false?></p>
            </div>
            <div class="gender">
                <label class="pick" for="">Giới tính</label>
                <input type="radio" name="gender" value="1" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 1)?"checked":false?>><label for="male">Nam</label>
                <input type="radio" name="gender" value="2" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 2)?"checked":false?>><label for="female">Nữ</label>
                <input type="radio" name="gender" value="3" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 3)?"checked":false?>><label for="other">Khác</label>
                <p class="err difference"><?php echo (!empty($errors) && array_key_exists("gender",$errors))?$errors["gender"]:false?></p>
            </div>
            <div class="input-field">
                <input type="password" name="password">
                <label for="">Mật khẩu</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("password",$errors))?$errors["password"]:false?></p>
            </div>
            <div class="input-field">
                <input type="password" name="repassword">
                <label for="">Nhập lại mật khẩu</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("repassword",$errors))?$errors["repassword"]:false?></p>
            </div>
            <div class="button">
                <button name="register" style="--clr:#1e9bff">
                    <span>Đăng ký</span>
                </button>
            </div>
            <div class="signin">
                <p>Bạn đã có tài khoản?<a href="Login">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</body>
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
</html>
