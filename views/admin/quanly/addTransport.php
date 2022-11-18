<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:3",
        "img" => "required|img",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên dịch vụ quá ngắn",
        "img.required" => "Không được để trống",
        "img.img" => "file không hợp lệ",
    ];
    $errors = [];
    if(isset($_POST["addTransport"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $queryBuilder->excute($queryBuilder->inserData("list_transport",$data));
        }
    }
?>

<main>
        <form action="" method="POST" class="box">
            <h2>Add Transport</h2>
            <div>
                <div class="name">
                    <input type="text" name="name">
                    <label for="">Tên phương tiện</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                    <input type="file" name="img" class="file">
                    <label for="">Biểu tượng</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addTransport">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

