<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:10",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên Tỉnh/Thành quá ngắn",
    ];
    $errors = [];
    if(isset($_POST["addProvince"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $queryBuilder->excute($queryBuilder->inserData("province",$data));
        }
    }
?> 

<main>
        <form action="" method="POST" class="box">
            <h2>Add Province</h2>
            <div>
                <div class="name">
                    <input type="text" name="name">
                    <label for="">Tỉnh/Thành</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addProvince">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

