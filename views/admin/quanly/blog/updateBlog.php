<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "title" => "required|min:5",
        "status" => "required",
        "province_id" => "required"
    ];

    $message = [
        "title.required" => "Không được để trống",
        "title.min" => "Title quá ngắn",
        "status.required" => "Không được để trống",
        "province_id.required" => "Không được để trống",
    ];

    $blog = $queryBuilder->query($queryBuilder->table("blog")->select("*")->where("blog.Id","=",$_GET["Id"])->get())[0];
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
    $errors = [];
    if(isset($_POST["addBlog"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $_POST["content_blog"] = (!empty($_POST["content_blog"]))?"\"".htmlentities($_POST["content_blog"])."\""
            :"\"".htmlentities($blog["content_blog"])."\"";
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            $data["creat_time"] = date("Y-m-d");
            $file = $_FILES["files"];
            if(empty($data["img"])){
                $data["img"] = $blog["img"];
            }
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/blogs/".$data["img"]);
            if(!empty($file["name"][0])){
                $src = explode("src=",trim($_POST["content_blog"],"\""));
                $content = "";
                for($i = 0; $i < count($_FILES["files"]["name"]); $i++){
                    move_uploaded_file($file["tmp_name"][$i],_DIR_ROOT."/views/client/img/blogs/".$file["name"][$i]);
                    $src[$i+1] = trim($src[$i+1],"<img ");
                    $subsrc = explode(" ",$src[$i+1]);
                    $subsrc[0] = '"'._WEB_ROOT_."/views/client/img/blogs/".$file["name"][$i].'"';
                    $src[$i+1] = " src=";
                    foreach($subsrc as $item){
                        $src[$i+1].= " ".$item." ";
                    }
                    if(strlen($src[0] == 8)){
                        $src[$i+1] = substr($src[$i+1],0,-5);
                        $content .= $src[0].$src[$i+1];
                    }else{
                        $content .= $src[0].$src[$i+1];
                        $src[0] = "";
                    }
                }
                $data["content_blog"] = "'".$content."'";
            }

            $queryBuilder->excute($queryBuilder->updateData("blog",$data,"blog.Id = ".$_GET["Id"]));
        }
    }
?> 

<main>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="p-6">
                <div class="">
                    <form action="" class="addtour" name="addpost" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group m-b-20"></div>

                        <div class="form-group m-b-20"></div>
    
                        <div class="form-group m-b-20"></div>

                        <div class="row">
                        <div class="infor">
                            <h2>Add Blog</h2>
                            <div class="Tour">
                                <div class="ImgTour">
                                    <input type="file" name="img" multiple>
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$blog["img"]?>" alt="">
                                    <h4>Ảnh đại diện</h4>
                                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                                </div>
                                <div class="infortour">
                                    <label for="">
                                        <span>Tiêu đề</span>
                                        <input type="text" name="title" value="<?php echo (!empty($_POST["title"]))?$_POST["title"]:$blog["title"]?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("title",$errors))?$errors["title"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Tỉnh thành</span>
                                        <select name="province_id">
                                            <option value="" selected disabled>--Chọn tỉnh thành--</option>
                                            <?php 
                                                if(!empty($listProvince)){
                                                    foreach($listProvince as $item){
                                            ?>
                                                        <option value="<?php echo $item["Id"]?>" <?php echo (!empty($_POST["province_id"]) && $_POST["province_id"] == $item["Id"] || $blog["province_id"] == $item["Id"])?"selected":false?>><?php echo $item["name"]?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("province_id",$errors))?$errors["province_id"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Trạng thái</span>
                                        <select name="status" id="">
                                            <option value="" selected disabled>--Chọn trạng thái---</option>
                                            <option value="1" <?php echo (!empty($_POST["status"]) && $_POST["status"] == 1 || $blog["status"] == 1)?"selected":false?>>Nổi bật</option>
                                            <option value="2" <?php echo (!empty($_POST["status"]) && $_POST["status"] == 2 || $blog["status"] == 2)?"selected":false?>>Bình thường</option>
                                        </select>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("status",$errors))?$errors["status"]:false?></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Nội dung</b></h4>
                                <textarea class="summernote content_blog" name="content_blog" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box"></div>
                            </div>
                        </div>

                        <button type="submit" name="addBlog" class="btn btn-success waves-effect waves-light">Save and Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            var resizefunc = [];
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/jquery.min.js"?>"></script>
        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/bootstrap.min.js"?>"></script>
        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

                var contentBlog = document.querySelector(".content_blog + .note-editor .note-editable");
                contentBlog.innerHTML = `<?php echo html_entity_decode($blog["content_blog"])?>`;
            });
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </main>
</div>

