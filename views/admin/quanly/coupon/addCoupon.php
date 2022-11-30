<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "code" => "required|min:10|max:30",
        "amount" => "required",
        "coupon_value" => "required|discount",
        "type" => "required",
        "end_time" => "required",
        "description" => "required",
    ];

    $message = [
        "code.required" => "Không được để trống",
        "code.min" => "name phải có ít nhất 10 kí tự",
        "code.max" => "name không vượt quá 30 kí tự",
        "amount.required" => "Không được để trống",
        "coupon_value.required" => "Không được để trống",
        "coupon_value.discount" => "Giá trị không hợp lệ",
        "type.required" => "không được để trống",
        "end_time.required" => "không được để trống",
        "description.required" => "Không được để trống",
    ];
    $errors = [];
    if(isset($_POST["addCoupon"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["creat_time"] = date("Y-m-d");
            $data["end_time"] = date_format(date_create($_POST["end_time"]),"Y-m-d");
            $queryBuilder->excute($queryBuilder->inserData("discount_code",$data));
        }
    }
?>    

    <main>
        <form action="" class="addcustomer" method="POST">
            <h2>Add Coupon</h2>
            <div class="grid">
                <div class="name">
                    <input type="text" class="code" name="code">
                    <label for="">Mã coupon</label>
                    <span><i class="fa-solid fa-plus"></i></span>
                    <span><i class="fa-solid fa-arrows-rotate" onclick="getCodeCoupon()"></i></span>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("code",$errors))?$errors["code"]:false?></p>
                </div>
                <div class="role">
                    <select id="role" name="type">
                        <option value="" selected disabled>--Loại--</option>
                        <option value="1">Theo giá</option>
                        <option value="2">Theo phần trăm</option>
                    </select>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("type",$errors))?$errors["type"]:false?></p>
                </div>
                <div class="phone">
                    <input type="number" name="amount">
                    <label for="">Số lượng</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("amount",$errors))?$errors["amount"]:false?></p>
                </div>
                <div class="Email">
                    <input type="text" name="coupon_value">
                    <label for="">Giá trị</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("coupon_value",$errors))?$errors["coupon_value"]:false?></p>
                </div>
                <div class="Email">
                <input id="myID" name="end_time" placeholder="Ngày hết hạn">
                    <!-- <label for="">Ngày hết hạn</label> -->
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("end_time",$errors))?$errors["end_time"]:false?></p>
                </div>
                <div class="password">
                    <input type="text" class="pass" name="description">
                    <label for="">Miêu tả</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("description",$errors))?$errors["description"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addCoupon">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#myID",{
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: "today",
        defaultDate: "<?php echo (!empty($_POST["end_time"]))?date_format(date_create($_POST["end_time"]),"d-m-Y"):false;?>"
    });
</script>

<script>
    var faPlus = document.querySelector(".fa-plus");
    
    faPlus.addEventListener("click",()=>{
        var faRow = document.querySelector(".fa-arrows-rotate");
        faPlus.style = "display:none";
        faRow.style = "display:block";
        getCodeCoupon();
    });

    function getCodeCoupon(){
        var codeCoupon = document.querySelector(".code");
        var captch = Math.random().toString(36).substring(2,16);
        codeCoupon.value = captch;
    }
</script>