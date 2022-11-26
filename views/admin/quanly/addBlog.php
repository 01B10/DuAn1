<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "title" => "required|min:5",
        "img" => "img",
        "status" => "required",
        "province_id" => "required"
    ];

    $message = [
        "title.required" => "Không được để trống",
        "title.min" => "Title quá ngắn",
        "img.img" => "file không hợp lệ",
        "status.required" => "Không được để trống",
        "province_id.required" => "Không được để trống",
    ];

    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
    $errors = [];
    if(isset($_POST["addBlog"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $_POST["content_blog"] = "\"".htmlentities($_POST["content_blog"])."\"";
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            $data["creat_time"] = date("Y-m-d");
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/blogs/".$data["img"]);
            $queryBuilder->excute($queryBuilder->inserData("blog",$data));
            $_POST = "";
        }
    }
?> 

<main>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="p-6">
                <div class="">
                    <form class="addtour" name="addpost" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group m-b-20"></div>

                        <div class="form-group m-b-20"></div>
    
                        <div class="form-group m-b-20"></div>

                        <div class="row">
                        <div class="infor">
                            <h2>Add Blog</h2>
                            <div class="Tour">
                                <div class="ImgTour">
                                    <input type="file" name="img">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/default-image.jpg"?>" alt="">
                                    <h4>Ảnh đại diện</h4>
                                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                                </div>
                                <div class="infortour">
                                    <label for="">
                                        <span>Tiêu đề</span>
                                        <input type="text" name="title">
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
                                                        <option value="<?php echo $item["Id"]?>"><?php echo $item["name"]?></option>
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
                                            <option value="1">Nổi bật</option>
                                            <option value="2">Bình thường</option>
                                        </select>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("status",$errors))?$errors["status"]:false?></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Nội dung</b></h4>
                                <textarea class="summernote" name="content_blog" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box"></div>
                            </div>
                        </div>

                        <button type="submit" name="addBlog" class="btn btn-success waves-effect waves-light">Save and Post</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
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
            });
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </main>
</div>

