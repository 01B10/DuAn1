<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:6",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên dịch vụ quá ngắn",
        "img.required" => "Không được để trống",
    ];

    $service = $queryBuilder->query($queryBuilder->table("list_service")->select("*")
    ->where("list_service.Id","=",$_GET["Id"])
    ->get())[0];

    $errors = [];
    if(isset($_POST["addService"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            if(empty($data["img"])){
                $data["img"] = $service["img"];
            }
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/admin/icon/".$data["img"]);
            $queryBuilder->excute($queryBuilder->updateData("list_service",$data,"list_service.Id = ".$_GET["Id"]));
        }
    }
?>

<main>
        <form action="" method="POST" class="box" enctype="multipart/form-data">
            <h2>Add Service</h2>
            <div>
                <div class="name">
                    <input type="text" name="name" value="<?php echo (!empty($_POST["name"]))?$_POST["name"]:$service["name"]?>">
                    <label for="">Tên dịch vụ</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                <input type="file" name="img" class="file" style="display: none;">
                    <img src="<?php echo _WEB_ROOT_."/views/admin/icon/".$service["img"]?>" alt="">
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addService">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

