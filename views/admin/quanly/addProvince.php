<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:5",
        "img" => "required|img",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên Tỉnh/Thành quá ngắn",
        "img.required" => "Không được để trống",
        "img.img" => "file không hợp lệ",
    ];
    $errors = [];
    if(isset($_POST["addProvince"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/province/".$data["img"]);
            $queryBuilder->excute($queryBuilder->inserData("province",$data));
        }
    }
?> 

<main>
        <form action="" method="POST" class="box" enctype="multipart/form-data">
            <h2>Add Province</h2>
            <div>
                <div class="name">
                    <input type="text" name="name">
                    <label for="">Tỉnh/Thành</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                    <input type="file" name="img" class="file">
                    <label for="">Biểu tượng</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addProvince">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

