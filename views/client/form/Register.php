<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:10|max:30",
        "email" => "required|email|min:13|unique:customer:email",
        "phone" => "required|min:10|max:11|phone|unique:customer:phone",
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
            <h2>Register</h2>
            <div class="input-field">
                <input type="text" required>
                <label for="">Enter your name</label>
            </div>
            <div class="input-field">
                <input type="email" required>
                <label for="">Enter your email</label>
            </div>
            <div class="input-field">
                <input type="text" required>
                <label for="">Phone number</label>
            </div>
            <div class="gender">
                <label class="pick" for="">Gender</label>
                <input type="radio" name="gender" value="1"><label for="male">Male</label>
                <input type="radio" name="gender" value="2"><label for="female">Female</label>
                <input type="radio" name="gender" value="3"><label for="other">Other</label>
                <p class="err difference"><?php echo (!empty($errors) && array_key_exists("gender",$errors))?$errors["gender"]:false?></p>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label for="">Password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
                <p class="err"><?php echo (!empty($errors) && array_key_exists("password",$errors))?$errors["password"]:false?></p>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label for="">Confirm password</label>
                <span class="show-btn"><i class="fas fa-eye"></i></span>
            </div>
            <div class="capcha">
                <label for="capcha-input">Enter capcha</label>
                <div class="preview"></div>
                <div class="capcha-form">
                    <input type="text"  id="capcha-form" placeholder="Enter capcha">
                    <button class="capcha-refresh"><i class="fas fa-sync"></i></button>
                </div>
            </div>
            <!-- <div class="forgot">
                <a href="./ForgotPass.html">Forgot password?</a>
            </div> -->
            <div class="button">
                <button style="--clr:#1e9bff">
                    <a href=""><span>Register Now</span></a>
                </button>
            </div>
            <div class="signin">
                <p>Already have an account?<a href="Login">Sign in</a></p>
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
</script>