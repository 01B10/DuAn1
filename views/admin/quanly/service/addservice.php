<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:6",
        "img" => "required|img",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên dịch vụ quá ngắn",
        "img.required" => "Không được để trống",
        "img.img" => "file không hợp lệ",
    ];
    $errors = [];
    if(isset($_POST["addService"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            $_POST = "";
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/admin/icon/".$data["img"]);
            $queryBuilder->excute($queryBuilder->inserData("list_service",$data));
            $data = "";
        }
    }
?>

<main>
        <form action="" method="POST" class="box" enctype="multipart/form-data">
            <h2>Add Service</h2>
            <div>
                <div class="name">
                    <input type="text" name="name">
                    <label for="">Tên dịch vụ</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                    <input type="file" name="img" class="file">
                    <label for="">Biểu tượng</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addService">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

