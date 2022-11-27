<?php 
    if(isset($_SESSION["Login"]["customer"])){
        $queryBuilder = new QueryBuilder();

        $rule = [
            "name" => "required|min:10|max:30",
            "email" => "required|email|min:13|change:customer:email",
            "phone" => "required|min:10|max:11|number|change:customer:phone",
            "gender" => "required",
        ];

        $rule1 = [
            "password" => "required",
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
            "phone.change" => "phone đã tồn tại",
            "gender.required" => "không được để trống",
            "email.required" => "Không được để trống",
            "email.min" => "email phải có ít nhất 4 kí tự",
            "email.email" => "email không hợp lệ",
            "email.change" => "email đã tồn tại",
        ];

        $message1 = [
            "password.required" => "Không được để trống",
            "repassword.required" => "Không được để trống",
            "repassword.match" => "repassword không đúng",
        ];

        $errors = [];
        $customer = $queryBuilder->query($queryBuilder->table("customer")->select("*")
        ->where("customer.Id","=",$_SESSION["Login"]["customer"]["Id"])->get())[0];

        if(isset($_POST["update"])){
            $validate =  validate($rule,$message,$errors);
            $errors = errors("",$errors);
            if($validate){
                $data = array_filter($_POST);
                $data["img"] = $_FILES["img"]["name"];
                if(empty($data["img"])){
                    $data["img"] = "Default_pfp.svg.png";
                }
                move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/customer/".$data["img"]);
                $queryBuilder->excute($queryBuilder->updateData("customer",$data,"customer.Id = ".$_SESSION["Login"]["customer"]["Id"]));
            }
        }

        if(isset($_POST["changePass"])){
            $validate =  validate($rule1,$message1,$errors);
            $errors = errors("",$errors);
            if($validate){
                $queryBuilder->excute($queryBuilder->updateData("customer",["password"=>$_POST["repassword"]],"customer.Id = ".$_SESSION["Login"]["customer"]["Id"]));
            }
        }
    }else{
        header("Location: Trang-Chu");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/taikhoan.css"?>">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
</head>

<body>
    <a href="Trang-Chu">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <main>
        <div class="form">
            <div class="account">
                <h3>Thông tin tài khoản</h3>
                <div class="user">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="user-img">
                            <img class="img" src="<?php echo _WEB_ROOT_."/views/client/img/customer/".$customer["img"]?>" alt="">
                            <div class="change-img">
                                <label for="">Thay đổi ảnh đại diện</label><br>
                                <input type="file" name="img" class="fileImg" style="display: none;">
                            </div>
                            <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                        </div>
                        <div class="infomation">
                            <div class="info">
                                <label for="">Họ và tên</label>
                                <input type="text" name="name" value="<?php echo $customer["name"]?>">
                                <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                            </div>

                            <div class="info">
                                <label for="">Giới tính</label>
                                <div class="gender">
                                    <label for="male">
                                        <input type="radio" id="male" name="gender" value="1" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 1 || $customer["gender"] == 1)?"checked":false?>>Nam
                                    </label>
                                    <label for="female">
                                        <input type="radio" id="female" name="gender" value="2" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 2 || $customer["gender"] == 2)?"checked":false?>>Nữ
                                    </label>
                                    <label for="other">
                                        <input type="radio" id="other" name="gender" value="3" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == 3 || $customer["gender"] == 3)?"checked":false?>>khác
                                    </label>
                                </div>
                                <p class="err difference"><?php echo (!empty($errors) && array_key_exists("gender",$errors))?$errors["gender"]:false?></p>
                            </div>
                            <div class="info">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?php echo $customer["email"]?>">
                                <p class="err"><?php echo (!empty($errors) && array_key_exists("email",$errors))?$errors["email"]:false?></p>
                            </div>
                            <div class="info">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="phone" value="<?php echo $customer["phone"]?>">
                                <p class="err"><?php echo (!empty($errors) && array_key_exists("phone",$errors))?$errors["phone"]:false?></p>
                            </div>
                        </div>
                        <button class="btnUpdate" name="update">Cập nhật</button>
                    </form>
                </div>
            </div>
            <form action="" method="POST">
                <div class="change">
                    <h3 class="h3-change">Đổi mật khẩu</h3>
                    <div class="change-pass">
                        <div class="new-pass">
                            <label for="">Mật khẩu cũ</label>
                            <input type="password" class="pass" value="<?php echo $customer["password"]?>" placeholder="Nhập mật khẩu cũ" readonly>
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="new-pass">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" name="password" class="pass" placeholder="Nhập mật khẩu mới">
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                            <p class="err"><?php echo (!empty($errors) && array_key_exists("password",$errors))?$errors["password"]:false?></p>
                        </div>
                        <div class="new-pass">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" name="repassword" class="pass" placeholder="Nhập lại mật khẩu mới">
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                            <p class="err"><?php echo (!empty($errors) && array_key_exists("repassword",$errors))?$errors["repassword"]:false?></p>
                        </div>
                        <button name="changePass"><i class="fas fa-lock"></i>Thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="history">
            <h3>Lịch sử đơn đặt</h3>
            <table cellpadding="10"  >
                <thead>
                    <th>Id</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Tour</th>
                    <th>Thời gian đặt</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                            <!-- php code -->
                        </td>
                        <td>
                           
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                        <td>
                          
                            <!-- php code -->
                        </td>
                        <td>
                           
                            <!-- php code -->
                        </td>
                        <td>
                            
                            <!-- php code -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    const passField = document.querySelectorAll(".pass");
    const showBtn = document.querySelectorAll("span i");
    const img = document.querySelector(".img");
    const input = document.querySelector(".fileImg");

    showBtn.forEach((e,x)=>{
        e.addEventListener("click",()=>{
            if (passField[x].type == "password") {
            passField[x].type = "text";
            showBtn[x].classList.add("hide-btn");
            } else {
                passField[x].type = "password";
                showBtn[x].classList.remove("hide-btn");
            }
        })
    })

    img.addEventListener("click",()=>{
        input.click();
    });

</script>
</html>