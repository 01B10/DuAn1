
<?php
const REQUIRED_MSG_name = "Quý khách vui lòng nhập họ và tên!";
const REQUIRED_MSG_email = "Quý khách vui lòng nhập email!";
const REQUIRED_MSG_phone = "Quý khách vui lòng nhập SĐT!";
const REQUIRED_MSG_pass = "Quý khách vui lòng nhập mật khẩu!";
const REQUIRED_MSG_cppass = "Quý khách vui lòng xác nhận lại mật khẩu!";
const REQUIRED_MSG_gender = "Quý khách vui lòng chọn giới tính!";
const REQUIRED_MSG_province = "Quý khách vui lòng chọn địa điểm!";
 
// định nghĩa các biến và set giá trị mặc định là blank
$nameErr = $emailErr = $phoneErr = $passwordErr = $cppasswordErr = $genderErr = $provinceErr = "";
$name = $email = $phone = $password = $cppassword = $gender = $comment = $province = "";
 
// xác thực form bằng PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // name
  if (empty($_POST["fullname"])) {
    $nameErr = REQUIRED_MSG_name;
  } 
  // Email
  if (empty($_POST["email"])) {
    $emailErr =  REQUIRED_MSG_email;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Quý khách vi lòng nhập chính xác email!";
    }
  }
  // Phone
  if (empty($_POST["phone"])) {
    $phoneErr =  REQUIRED_MSG_phone;
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
      $phoneErr = "Quý khách vi lòng nhập chính xác SĐT!";
    }
  }

  // Mật khẩu 
  if (empty($_POST["password"])) {
    $passwordErr =  REQUIRED_MSG_pass;
  } 
  // Confirm
  if (empty($_POST["cppassword"])) {
    $cppasswordErr =  REQUIRED_MSG_cppass;
  } 

  if (empty($_POST["province"])) {
    $provinceErr =  REQUIRED_MSG_province;
  } 

  // Mật Khẩu & Confirm 
  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cppassword"])) {
    $password = test_input($_POST["password"]);
    $cppassword = test_input($_POST["cppassword"]);
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Mật khẩu của bạn phải chứa ít nhất 8 ký tự!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Mật khẩu của bạn phải chứa ít nhất 1 số!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Mật khẩu của bạn phải chứa ít nhất 1 chữ in hoa!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) {
    $cppasswordErr = "Quý khách vui lòng xác nhận lại mật khẩu!";
} else {
     $passwordErr = "Xin Vui lòng nhập mật khẩu!";
} 
     
  
 
  // if (empty($_POST["comment"])) {
  //   $comment = "";
  // } else {
  //   $comment = test_input($_POST["comment"]);
  // }
 
  if (empty($_POST["gender"])) {
    $genderErr = REQUIRED_MSG_gender;
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
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
        .error {
          color: red;
        }
    </style>
</head>


<body>
    <div class="main">

        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng Ký Tài Khoản</h3>
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Dương Công Lực" class="form-control">
            <span class="error"><?php echo $nameErr;?></span>
            
          </div>
      
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
            <span class="error"><?php echo $emailErr;?></span>
           
          </div>

          <div class="form-group">
            
              <label for="phone" class="form-label">Phone number</label>
              <input type="text"  class="form-control" id="phone" name="phone" placeholder="Số điện thoại">
              <span class="error"><?php echo $phoneErr;?></span>
        </div>
      
          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="error"><?php echo $passwordErr;?></span>
          </div>
      
          <div class="form-group">
            <label for="cppassword" class="form-label">Nhập lại mật khẩu</label>
            <input id="cppassword" name="cppassword" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="error"><?php echo $cppasswordErr;?></span>
          </div>

          <div class="form-group">
            <label for="province" class="form-label">Địa điểm của bạn</label>
            <select id="province" name="province"  class="form-control">
                 <option value="">-- Chọn Tỉnh/TP --</option>
                 <option value="hn">Hà Nội</option>
                 <option value="hcm">Hồ Chí Minh</option>
                 <option value="hp">Hải Phòng</option>
                 <option value="dn">Đà Nẵng</option>
            </select>
            <span class="error"><?php echo $provinceErr;?></span>
          </div>

          <div class="form-group horizontal">
            <label for="password_confirmation" class="form-label">Giới Tính</label>
            <div class="gender">
              <label for="male">Nam</label>
              <input name="gender" type="radio" class="form-control-gender" value="Nam">
              <label for="" class="female">Nữ</label>
              <input name="gender" type="radio" class="form-control-gender" value="Nữ">
              <label for="" class="orther">Khác</label>
              <input name="gender" type="radio" class="form-control-gender" value="Khác">
             </div>
             <span class="error"><?php echo $genderErr;?></span>
          </div>
      
          <button class="form-submit">Đăng ký</button>
        </form>
      
      </div>
      <!-- <script src="http://localhost/DuAn1/DuAn1/views/client/assets/js/validator.js"></script> -->
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
                Validator.isRequired('#password_confirmation','Vui lòng nhập lại mật khẩu!'),
                Validator.isRequired('#province'),
                Validator.isConfirmed('#password_confirmation', function () {
                     return document.querySelector('#form-1 #password').value;
                },'Mật Khẩu nhập lại không chính xác')

            ],
            onsubmit: function (data) {
            console.log(data);
          }
        });
      </script>
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
