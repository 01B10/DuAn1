<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:10|max:30",
        "email" => "required|email|min:13",
        "phone" => "required||min:10|max:11|phone",
        "gender" => "required",
        "password" => "required|min:5|max:20",
        "role" => "required"
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "name phải có ít nhất 10 kí tự",
        "name.max" => "name không vượt quá 30 kí tự",
        "phone.required" => "Không được để trống",
        "phone.min" => "phone không hợp lệ",
        "phone.max" => "phone không hợp lệ",
        "phone.phone" => "phone không hợp lệ",
        "gender.required" => "không được để trống",
        "email.required" => "Không được để trống",
        "email.min" => "email phải có ít nhất 4 kí tự",
        "email.email" => "email không hợp lệ",
        "password.required" => "Không được để trống",
        "password.min" => "password phải có ít nhất 4 kí tự",
        "password.max" => "password không vượt quá 10 kí tự",
        "role.required" => "Không được để trống",
    ];
    $errors = [];
    if(isset($_POST["addcustomer"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = "Default_pfp.svg.png";
            $queryBuilder->excute($queryBuilder->inserData("customer",$data));
        }
    }
?>    

    <main>
        <form action="" class="addcustomer" method="POST">
            <h2>Add Customer</h2>
            <div class="grid">
                <div class="name">
                    <input type="text" name="name">
                    <label for="">Họ và tên</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="phone">
                    <input type="text" name="phone">
                    <label for="">Số điện thoại</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("phone",$errors))?$errors["phone"]:false?></p>
                </div>
                <div class="Email">
                    <input type="text" name="email">
                    <label for="">Email</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("email",$errors))?$errors["email"]:false?></p>
                </div>
                <div class="password">
                    <input type="password" class="pass" name="password">
                    <label for="">Password</label>
                    <span class="show-btn"><i class="fas fa-eye"></i></span>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("password",$errors))?$errors["password"]:false?></p>
                </div>

                <div class="role">
                    <select id="role" name="role">
                        <option value="" selected disabled>--Vai trò--</option>
                        <option value="1">Nhân viên</option>
                        <option value="2">Khách hàng</option>
                    </select>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("role",$errors))?$errors["role"]:false?></p>
                </div>


            </div>
            <div class="gender">
                <label for="">Giới tính</label>
                <div class="gender-choose">
                    <label for="nam"><input id="nam" type="radio" name="gender" value="1"> Nam</label>
                    <label for="nu"><input id="nu" type="radio" name="gender" value="2"> Nữ</label>
                    <label for="other"><input id="other" type="radio" name="gender" value="3"> Khác</label>
                </div>
            </div>
            <p class="err"><?php echo (!empty($errors) && array_key_exists("gender",$errors))?$errors["gender"]:false?></p>
            <div class="button">
                <button class="submit" name="addcustomer">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

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
