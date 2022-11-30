<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:5",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên Tỉnh/Thành quá ngắn",
    ];

    $province = $queryBuilder->query($queryBuilder->table("province")
    ->select("*")->where("province.Id","=",$_GET["Id"])
    ->get())[0];

    $errors = [];
    if(isset($_POST["addProvince"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            if(empty($data["img"])){
                $data["img"] = $province["img"];
            }
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/province/".$data["img"]);
            $queryBuilder->excute($queryBuilder->updateData("province",$data,"province.Id = ".$_GET["Id"]));
        }
    }
?> 

<main>
        <form action="" method="POST" class="box" enctype="multipart/form-data">
            <h2>Add Province</h2>
            <div>
                <div class="name">
                    <input type="text" name="name" value="<?php echo (!empty($_POST["name"]))?$_POST["name"]:$province["name"]?>">
                    <label for="">Tỉnh/Thành</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                    <input type="file" name="img" class="file" style="display: none;">
                    <img src="<?php echo _WEB_ROOT_."/views/client/img/province/".$province["img"]?>" alt="">
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addProvince">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

