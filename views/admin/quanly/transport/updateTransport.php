<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:3",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "Tên phương tiện quá ngắn",
    ];

    $transport = $queryBuilder->query($queryBuilder->table("list_transport")
    ->select("*")->where("list_transport.Id","=",$_GET["Id"])
    ->get())[0];

    $errors = [];
    if(isset($_POST["addTransport"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            if(empty($data["img"])){
                $data["img"] = $transport["img"];
            }
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/admin/icon/".$data["img"]);
            $queryBuilder->excute($queryBuilder->updateData("list_transport",$data,"list_transport.Id = ",$_GET));
        }
    }
?>

<main>
        <form action="" method="POST" class="box" enctype="multipart/form-data">
            <h2>Update Transport</h2>
            <div>
                <div class="name">
                    <input type="text" name="name" value="<?php echo (!empty($_POST["name"]))?$_POST["name"]:$transport["name"]?>">
                    <label for="">Tên phương tiện</label>
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                </div>
                <div class="name">
                <input type="file" name="img" class="file" style="display: none;">
                    <img src="<?php echo _WEB_ROOT_."/views/admin/icon/".$transport["img"]?>" alt="">
                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                </div>
            </div>
            <div class="button">
                <button class="submit" name="addTransport">Thêm mới</button>
            </div>
        </form>
    </main>
</div>

